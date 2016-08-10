<?php

namespace app\Http\Controllers;

use Auth;
use Cache;
use DB;
use Illuminate\Http\Request;
use View;
use Gate;
use Input;
use PDF;
use Response;
use App\Positions;
use Route;
use App\CV;
use App\User;
use App\Record;
use App\Status;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use Nicolaslopezj\Searchable\SearchableTrait;
use Vinkla\Hashids\Facades\Hashids;
use App\MyLibrary\Pagination_temp;
use Validator;
use App\Http\Requests\xCV\CVRuleInfoRequest;


class CVController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $s_name = $request->get('search');
            $s_name = preg_replace('/\'/', '', $s_name);
        } else {
            $s_name = '';
        }

        if ($request->has('positions') ) {
            $positions = (int)$request->get('positions');
        }else {
            $positions = null;

        }

        if ($request->has('status')) {
            $status = (int)$request->get('status');
        }else {
            $status = '';
        }

        if ($request->has('data-field')) {
            $_field = $request->get('data-field');
        }else {
            $_field = 'updated_at';
        }

        if ($request->has('data-sort')) {
            $_sort = $request->get('data-sort');
        } else {
            $_sort = 'asc';
        }

        if ($request->has('per_page')) {
            $_numpage = (int)$request->get('per_page');
            if ($_numpage <= 0) $_numpage = 10;
        } else {
            $_numpage = 10;
        }

        if ($request->has('page')) {
            $_page = (int)$request->get('page');
        } else {
            $_page = 1;
        }


        list($CVs, $_Position, $_Status, $get_paging)= $this->paginationCV($s_name, $positions, $status, $_field, $_sort, $_page, $_numpage);
        $count = count($CVs);

        return view('xCV.CVindex', compact('CVs', 'count', '_numpage', 'get_paging', '_Position', '_Status'));
    }

    /*********Advance Search**************/
    public function adSearch(Request $request)
    {
        if (Gate::denies('Visitor')) {
            abort(403);
        }
//        $positions = $request->input('positionsSearch');
//        $name = $request->input('nameSearch');
//        $Status = $request->input('statusSearch');

        $positions = $request->input('positions');
        $name = $request->input('name');
        $Status = $request->input('Status');
        $field = $request->input('field');
        $sort = $request->input('sort');
        $per_page = $request->input('show_entries');
        $txtActive = $request->input('txtActive');
        $txtLive = $request->input('txtLive');

        if ($request->has('page')) {
            $_page = (int)$request->get('page');
        } else {
            $_page = 1;
        }

        list($CVs, $_Position, $_Status, $get_paging) = $this->paginationCV($name, $positions, $Status, $field, $sort, $_page, $per_page, $txtActive, $txtLive);
        $count = count($CVs);

        return Response::json(array(
                'data' => view('includes.table-result', compact('CVs', 'count', '_numpage', '_Position', '_Status'))->render(),
                'pagination' => $get_paging,
                'url' => \URL::action('CVController@index')
            )
        );
    }

    /************Search orderBy Name Positions Status Age*************/
    public function resort1()
    {
        if (Gate::denies('Visitor')) {
            abort(403);
        }
        return view('xCV.resort', compact('CVs'));
    }


    public function show($id)
    {
        //$id = $id - 14000;
        $CV = CV::with('User')->find($id);
        if (Gate::denies('view-cv', $CV)) {
            abort(403);
        }
        if (empty($CV)) {
            abort(404, 'Lỗi, Không tìm thấy trang');
        }
        $skills = $CV->Skill;
        $Records = $CV->Record;
        $Records = $Records->sortBy("Date");
        $image = $CV->User->image;
        $bookmark = DB::table('bookmarks')
            ->whereUserId(Auth::User()->id)
            ->whereBookmarkUserId($CV->user_id)->first();
        if ($bookmark === null) $bookmark = 0;
        else $bookmark = $bookmark->id;
        return View::make('xCV.CVshow')
            ->with(compact('CV', 'Records', 'skills', 'image', 'bookmark'));

    }

    public function edit($id)//Get
    {
        //$id = $id - 14000;
        $uCV = User::find(Auth::user()->id);
        $cv = CV::findOrFail($id);
        if (Gate::denies('update-cv', $cv->user_id)) {
            abort(403);
        }
        $skills = $cv->Skill;
        $Records = $cv->Record;
        $Records = $Records->sortBy("Date");
        return View::make('xCV.CVStep')->with('CV', $cv)->with('uCV', $uCV)->with('Records', $Records)->with('skills', $skills);
        //return View::make('xCV.CVcreate')->with('CV', $cv)->with('Records', $Records)->with('skills', $skills);
    }

    public function update($id, UpdateRequest $request)//PUT
    {
        $cv = CV::findOrFail($id);
        if (Gate::denies('update-cv', $cv->user_id)) {
            abort(403);
        }

        if ($request->has('B_date')) {
            $cv->Birth_date = getDateDate($request->input('B_date'));
            $cv->save();
            exit();
        }

        if ($request->get('apply_to')) {
            $cv->apply_to = $request->get('apply_to');
            $cv->positions = \App\Positions::find($cv->apply_to)->name;
            $cv->save();
            exit();
        }

        if ($request->hasFile('attach')) {
            $data['is_ck'] = 'false';
            $file = $request->file('attach');
            if ($file->getClientOriginalExtension() != 'pdf') {
                return \Response::json($data);
            }

            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $attach = $timestamp . '-' . $file->getClientOriginalName();
            $oldattach = public_path('files/') . $cv->attach;
            if (\File::exists($oldattach)) {
                \File::exists($oldattach) && \File::delete($oldattach);
            }
            $file->move(public_path() . '/files/', $attach);

            $cv->attach = $attach;
            $cv->save();

            $data['url'] = '/files/' . $attach;
            $data['namefile'] = $attach;
            $data['is_ck'] = 'true';
            return \Response::json($data);
        }

        // update active CV + notes + active by author for CV show
        if ($request->has('txtAction') || $request->has('txtNotes')) {
            $cv->Active = $request->input('txtAction');
            $cv->notes = $request->input('txtNotes');
            $cv->active_by = Auth::user()->id;
            $cv->save();
            return '';
            //return \Response::json(array('url'=> \URL::previous()));
        }
        // chi nguoi tạo CV moi co quyen cho CV dang truc tuyen
        if ($request->has('txtLiveCv')) {
            $ucvLive = DB::table('cvs')
                ->where('user_id', Auth::user()->id)
                ->get();

            if (count($ucvLive)) {
                foreach ($ucvLive as $items) {
                    if ($id === $items->id) {
                        DB::table('cvs')
                            ->where('id', $items->id)
                            ->update(['live' => $request->get('txtLiveCv')]);
                    } else {
                        if ($request->get('txtLiveCv')) {
                            DB::table('cvs')
                                ->where('id', $items->id)
                                ->update(['live' => 0]);
                        }
                    }
                }
            }
            http://localhost:8000/CV/info
            return $_SERVER['HTTP_REFERER'];
        }

        $cv->update($request->all());
    }


    public function getPDF($id, Request $request)
    {
        $CV = CV::findOrFail($id);
        if (Gate::denies('view-cv', $CV)) {
            abort(403);
        }
        $Records = $CV->Record;
        $Records = $Records->sortBy("Date");

        $html = View::make('invoice.cv')
            ->with('CV', $CV)->with('Records', $Records)->render();
        //$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');


        $dompdf = PDF::loadHTML($html);
        $dompdf->getDomPDF()->set_option('enable_font_subsetting', true);

        return $dompdf->stream("CV.pdf");
    }

    public function getInfo()
    {
        if (Gate::denies('Applicant')) {
            abort(403);
        }
        $CV = CV::with('User')
            ->where('user_id', Auth::user()->id)
            ->get()
            ->toArray();

        return view('xCV.CVInfo', compact('CV'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Gate::denies('Applicant')) {
            abort(403);
        }

        $uCV = DB::table('users')->find(Auth::user()->id);
        $CV = CV::with('User')
            ->where('user_id', Auth::user()->id)
            ->where('type_cv', 0)
            ->first();
        if (count($CV)) {
            $skills = $CV->Skill;
            $Records = $CV->Record;
            $Records = $Records->sortBy("Date");
        }

        return view('xCV.CVStep', compact('uCV', 'CV', 'Records', 'skills'));
    }

    public function getCreateUpload()
    {
        if (Gate::denies('Applicant')) {
            abort(403);
        }

        $CV = CV::with('User')
            ->where('user_id', Auth::user()->id)
            ->where('type_cv', 1)
            ->first();

        $uCV = DB::table('users')->find(Auth::user()->id);
        $isUpload = 1;
        return view('xCV.CVStep', compact('uCV', 'CV', 'isUpload'));
    }

    public function store(CVRuleInfoRequest $request)
    {
        if (Gate::denies('Applicant')) {
            abort(403);
        }
        if ($request->ajax()) {
            $user = User::find(Auth::user()->id);
            $user->First_name = $request->Input('Firstname');
            $user->Last_name = $request->Input('LastName');
            $user->Furigana_name = $request->Input('txtFuriganaName');
            $user->Birth_date = $request->Input('txtDate');
            $user->Gender = $request->Input('rdGender');
            $user->Address = $request->Input('txtAddress');
            $user->Contact_information = $request->Input('txtContact');
            $user->Phone = $request->Input('txtPhone');
            $user->Self_intro = $request->Input('txtSelfIntro');
            $user->Marriage = 0;
            $user->save();

            if ($request->has('txtTypeCv')) {

                $is_namecv = DB::table('cvs')
                    ->select('name_cv')
                    ->where('user_id', Auth::user()->id)
                    ->where('type_cv', $request->get('txtTypeCv'))
                    ->get();

                if ($is_namecv) {
                    if (($request->Input('txtname') !== $is_namecv) && $request->Input('txtname')) {
                        $iscv = CV::where('user_id', Auth::user()->id)->where('type_cv', 0)->first();
                        $iscv->name_cv = $request->Input('txtname');
                        $iscv->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                        $iscv->save();
                    }
                } else {
                    DB::table('cvs')->insert(['user_id' => Auth::user()->id, 'name_cv' => $request->Input('txtname'), 'email' => Auth::user()->email, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 'type_cv' => $request->get('txtTypeCv')]);
                }

                return Response::json(array(
                        'url' => $_SERVER['HTTP_REFERER']
                    )
                );
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if (Gate::denies('Applicant')) {
            abort(403);
        }
        if ($request->has('type_cv')) {

            $cv = CV::where('id', '=', $id)
                ->where('type_cv', '=', $request->get('type_cv'))
                ->first();

            $note_ = '';
            if (count($cv)) {
                if (Gate::allows('del-cv', $cv)) {
                    // xoa cv lien ket Record[cv_id] -> Skill[cv_id]

                    // chua co anh CV. ghi chu chua lam colum[Photo] + PDF----
                    if ($request->get('type_cv')) {
                        if ($cv->type_cv) {
                            $oldattach = public_path('files/') . $cv->attach;
                            if (\File::exists($oldattach)) {
                                \File::exists($oldattach) && \File::delete($oldattach);
                            }
                        }
                    }

                    $cv->Record;
                    DB::table('it_skill')
                        ->where('cv_id', $cv->id)
                        ->delete();

                    $cv->delete();

                    $note_ = 'Bạn đã xóa thành công cv';
                } else {
                    $note_ = 'Lỗi, Bạn không có quyền hãy liên hệ với Admin!';
                }
            } else {
                $note_ = 'Lỗi, Bạn không có quyền hãy liên hệ với Admin!';
            }

            return Response::json(array(
                    'notes' => $note_,
                    'url' => \URL('/')
                )
            );
        }
    }

    public function changeStatus(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->has('id')) {
                $id = $request->input('id');
            } else {
                $id = $request->id;
            }
        } else {
            $id = $request->id;
        }

        $CV = CV::findorfail($id);

        if ($request->has('_potions')) {
            $CV->apply_to = $request->input('_potions');
            $CV->update();
            return 'true';
            //return \Response::json(array('url'=> \URL::previous()));
        }
        $CV->Status = $request->status;

        $CV->update();
        //get allow send mail info;
        $status = \App\Status::find($request->status);
        $CV->allow_sendmail = $status->allow_sendmail;
        //Get next status
        $next_status = array();
        foreach(\App\Status::all() as $status ){
            if( in_array($request->status,$status->previous_status) ){
                $next_status[] = $status;
            }
        }
        $CV->next_status = $next_status;
        

        return \Illuminate\Support\Facades\Response::json($CV);
    }

    /// Custom by BQN
    /// $name tim kiem theo ten
    /// $positions  tim theo vi tri tuyen dung
    /// $Status trang thai cua cv
    // Mac dinh sap xep theo ten tang dan voi 10 bang ghi tren mot trang

    public function paginationCV ($name = '', $positions = null, $Status = '', $_field = 'updated_at', $data_sort = 'asc', $_page = 1, $_numpage = 10, $txtActive = null, $txtLive = null)
    {
        if ($data_sort == "desc") {
            $bc = 'desc';
        } else {
            $bc = 'asc';
        }

        $is_live = $is_active = $str_po = $str_role = $str_or = $str_and = array();

        // cv kich hoat hoac chua kich hoat
        if ($txtActive == 2) {
            $is_active = [0, 1];
        } elseif ($txtActive == 1){
            $is_active = [1];
        } elseif (isset($txtActive) && $txtActive == 0) {
            $is_active = [0];
        }else {
            $is_active = [0, 1];
        }

        // chi cho phep 1 cv truc tuyen
        if ($txtLive == 2) {
            $is_live = [0, 1];
        } elseif ($txtLive == 1) {
            $is_live = [1];
        }elseif (isset($txtLive) && $txtLive == 0){
            $is_live = [0];
        }else {
            $is_live = [0, 1];
        }

        // them trang thai cv chua duoc kich hoat doi voi tai khoan toi cao
        if (Auth::user()->getrole() !== 'SuperAdmin') {
            unset($is_live[0]);
        }
        // xoa bo cv khong kich hoat voi nguoi quan tri vien
        if (Auth::user()->getrole() === 'Visitor') {
            unset($is_active[0]);
        }

        if ($Status != '') {
            $str_and['cvs.status'] = $Status;
        }

        // liet ke cac trang thai .... voi role_VisitorStatus = 1
        if (Auth::user()->getrole() === 'Visitor') {
            $_Status = Status::where('role_VisitorStatus', 1)->get();

            $list_id_visitor = $_Status->toArray();
            if (count($list_id_visitor)) {
                $str_role = array_column($list_id_visitor, 'id');
            } else {
                $str_role = [0];
            }
        } else {
            $_Status = Status::all();
        }

        if ($positions) {
            $str_po['cvs.apply_to'] = $positions;
        }
        if ($name) {
            $name = preg_replace('/\'/', '', $name);
            $str_or['cvs.First_name'] = $name;
            $str_or['cvs.Last_name'] = $name;
        }
        if ($_field) {
            if ($_field == 'name') {
                $none_field = 'name';
            } else {
                $none_field = $_field;
            }
        }else {
            $_field = 'Last_name';
            $none_field = 'updated_at';
        }

        $CV1 = CV::with('User')
            ->with('positionCv')
            ->with('status')
            ->join('users', 'users.id', '=', 'cvs.user_id')
            ->select(
                'cvs.*',
                'users.First_name as First_name',
                'users.Last_name as Last_name',
                'users.Furigana_name as Furigana_name',
                'users.Birth_date as Birth_date',
                'users.Gender as Gender',
                'users.Address as Address',
                'users.Phone as Phone',
                'users.Contact_information as Contact_information',
                'users.Self_intro as Self_intro'
            )
            ->where(function ($query) use ($name) {
                if ($name) {
                    $query->orwhere('users.Last_name', 'like', '%' . $name . '%')
                        ->orwhere('users.First_name', 'like', '%' . $name . '%');
                }
            })
            ->where($str_po)
            ->where(function ($query) use ($str_and, $str_role) {
                if ($str_and) {
                    $query->where($str_and);
                } else if ($str_role) {
                    $query->whereIn('cvs.status', $str_role);
                } else {

                }
            })
            ->isactive($is_active)
            ->live($is_live)
            ->orderBy('updated_at')
            ->get();

        if ($none_field == 'name') {
            if ($bc == 'asc'){
                $CV1 = $this->ASC($CV1);
//                $CV1 = $CV1->sortBy('updated_at');
            }

            else{
                $CV1 = $this->DESC($CV1);
//                $CV1 = $CV1->sortBy('updated_at');
            }
        } else{
            if($none_field == 'updated_at')
                $CV1 = $CV1->sortByDesc($none_field);
            else{
                if($bc == 'desc')
                    $CV1 = $CV1->sortBy($none_field);
                else $CV1 = $CV1->sortByDesc($none_field);
            }
        }

       // $CV1 = $CV1->sortBy('updated_at');

        // remove no name or age "0000-00-00";
        // remove record no get positions actives (1) with role Visitor
        if (Auth::user()->getRole() == 'Visitor') {
            $_Position = Positions::actives()->get();
            foreach ($CV1 as $key => $items) {
                $is_check = Positions::where('id', $items->apply_to)->actives()->count();
                if ($is_check == 0 || $items->Name == 'null' || $items->Age == "0000-00-00") {
                    unset($CV1[$key]);
                }
            }
        } else {
            $_Position = Positions::all();
        }

        $url_modify = Pagination_temp::cn_url_modify('search=' . $name, 'status=' . $Status, 'apply_to=' . $positions, 'data-field=' . $none_field, 'data-sort=' . $bc, 'per_page', 'page');
        list ($cvs, $get_paging) = Pagination_temp::cn_arr_pagina($CV1, $url_modify, $_page, $_numpage);

        return array($cvs, $_Position, $_Status, $get_paging);

    }

    public function DESC($CVs)
    {
        for ($i = 0; $i < $CVs->count(); $i++) {
            $name = $CVs[$i]->Last_name . " " . $CVs[$i]->First_name;
            $len = strlen($name);
            $start = stripos($name, " ");
            $end = strripos($name, " ");
            $ten = substr($name, $end + 1);
            $dem = substr($CVs[$i]->First_name, 0, $end - $len);
            $CVs[$i]->ten = $ten;
            $CVs[$i]->dem = $dem;
            $CVs[$i]->fullname = $CVs[$i]->ten . ' ' . $CVs[$i]->Last_name . ' ' . $CVs[$i]->dem;
        }
        $CVs = $CVs->sortByDesc('fullname');
        return $CVs;
    }

    public function ASC($CVs)
    {
        for ($i = 0; $i < $CVs->count(); $i++) {
            $name = $CVs[$i]->Last_name . " " . $CVs[$i]->First_name;
            $len = strlen($name);
            $start = stripos($name, " ");
            $end = strripos($name, " ");
            $ten = substr($name, $end + 1);
            $dem = substr($CVs[$i]->First_name, 0, $end - $len);
            $CVs[$i]->ten = $ten;
            $CVs[$i]->dem = $dem;
            $CVs[$i]->fullname = $CVs[$i]->ten . ' ' . $CVs[$i]->Last_name . ' ' . $CVs[$i]->dem;
        }
        $CVs = $CVs->sortBy('fullname');
        return $CVs;
    }


    public function getEditUpload ($id, Request $request)
    {
        if (Gate::denies('Applicant')) {
            abort(403);
        }
        if (count(Hashids::decode($id))) {
            $newId = Hashids::decode($id)[0];
        } else {
            abort(404, 'Lỗi nhất rùi ^_^, Chúng tôi không thấy trang bạn truy cập');
        }

        $CV = CV::with('User')
            ->where('id', $newId)
            ->where('type_cv', 1)
            ->first();

        $uCV = DB::table('users')->find($CV->user_id);
        $isUploadedit = 1;
        return view('xCV.CVStep', compact('uCV', 'CV', 'isUploadedit'));
    }

    public function getShowUpload ($id)
    {
        if (Gate::denies('Applicant')) {
            abort(403);
        }
        if (count(Hashids::decode($id))) {
            $newId = ['id' => Hashids::decode($id)[0]];
        } else {
            abort(404, 'Lỗi nhất rùi ^_^, Chúng tôi không thấy trang bạn truy cập');
        }

        $CV = CV::with('User')
            ->where('id', $newId)
            ->where('type_cv', 1)
            ->first();

        $uCV = DB::table('users')->find($CV->user_id);

        $bookmark = DB::table('bookmarks')
            ->whereUserId(Auth::User()->id)
            ->whereBookmarkUserId($CV->user_id)->first();
        if ($bookmark === null) $bookmark = 0;
        else $bookmark = $bookmark->id;
        return view('xCV.CVShowUpload', compact('uCV', 'CV', 'bookmark'));
    }

    public function statistic(Request $request){
        list($cv_upload, $cv_pass, $ox, $text) = $this->statisticMonth();
        return view('xCV.CVstatistic')->with('ox', $ox)->with('cv_upload', $cv_upload)
            ->with('cv_pass', $cv_pass)->with('text', $text);
    }

    public function statisticYear(){
        $cv3 = CV::select(DB::raw("count(id) as count, year(created_at) as year"))
            ->orderBy('created_at')
            ->groupBy(DB::raw('year(created_at)'))
            ->get();
        foreach ($cv3 as $cv) {
            $year = $cv->year;
            $datestart = $year.'-01-01 00:00:00';
            $dateend = $year.'-12-31 00:00:00';
            $cv1 = CV::select(DB::raw("count(id) as count"))
                ->where('created_at', '>=', $datestart)
                ->where('created_at', '<=', $dateend)
                ->where('Status', '=', 14)
                ->orderBy('created_at')
                ->get();
            if($cv1 != null)
                $cv->count_pass = $cv1[0]->count;
            else $cv->count_pass = 0;
        }
        $cv3 = $cv3->toArray();

        $count_year = array_column($cv3, 'count');
        $year = array_column($cv3,'year');
        $cv_pass = array_column($cv3, 'count_pass');
        
        $cv_upload = json_encode($count_year,JSON_NUMERIC_CHECK);
        $year = json_encode($year,JSON_NUMERIC_CHECK);
        $cv_pass = json_encode($cv_pass,JSON_NUMERIC_CHECK);
        $text = 'Thống kê CV theo năm';

        return array($cv_upload, $cv_pass,$year, $text);
    }

    public function statisticQuarter(){
        //now year
        $day = date('Y-m-d H:i:s');
        $year = getYear($day);
        $datestart = $year.'-01-01 00:00:00';
        $dateend = $year.'-12-31 00:00:00';

        $cv = CV::select(DB::raw("count(created_at) as count, quarter(created_at) as quarter"))
            ->where('created_at', '>=', $datestart)
            ->where('created_at', '<=', $dateend)
            ->orderBy('created_at')
            ->groupBy(DB::raw('quarter(created_at)'))
            ->get();
        foreach ($cv as $cv1) {
            $_quarter = $cv1->quarter;
            $month = $_quarter*3 + 1;
            $month1 = $month - 3;
            $datestart = $year.'-'.$month1.'-01 00:00:00';
            $dateend = $year.'-'.$month.'-01 00:00:00';
            $cv2 = CV::select(DB::raw("count(id) as count"))
            ->where('Status', '=', 14)
            ->where('created_at', '>=', $datestart)
            ->where('created_at', '<', $dateend)
            ->orderBy('created_at')
            ->get();

            if($cv2 != null)
                $cv1->count_pass = $cv2[0]->count;
            else $cv1->count_pass = 0;
            $cv1->month = 'Tháng '.$cv1->month;

            $cv1->quarter = 'Quý '.$cv1->quarter;
        }

        $cv = $cv->toArray();        
        $quarter = array_column($cv, 'quarter');
        $count_quarter = array_column($cv, 'count');
        $c_q_pass = array_column($cv, 'count_pass');

        $quarter = json_encode($quarter,JSON_NUMERIC_CHECK);
        $count_quarter = json_encode($count_quarter,JSON_NUMERIC_CHECK);
        $c_q_pass = json_encode($c_q_pass,JSON_NUMERIC_CHECK);
        $text = 'Thống kê CV theo quý';
        return array($count_quarter, $c_q_pass,$quarter, $text);
    }

    public function statisticMonth()
    {
        //by month
        $day = date('Y-m-d H:i:s');
        $year = getYear($day);
        $datestart = $year.'-01-01 00:00:00';
        $dateend = $year.'-12-31 00:00:00';

        $cv = CV::select(DB::raw("count(id) as count, month(created_at) as month"))
            ->where('created_at', '>=', $datestart)
            ->where('created_at', '<=', $dateend)
            ->orderBy('created_at')
            ->groupBy(DB::raw('month(created_at)'))
            ->get();
        foreach ($cv as $cv1) {
            $datestart = $year.'-'.$cv1->month.'-01 00:00:00';
            $month1 = $cv1->month + 1;
            $dateend = $year.'-'.$month1.'-01 00:00:00';
            $cv2 = CV::select(DB::raw("count(id) as count, month(created_at) as month"))
            ->where('Status', '=', 14)
            ->where('created_at', '>=', $datestart)
            ->where('created_at', '<', $dateend)
            ->orderBy('created_at')
            ->get();
            if($cv2 != null)
                $cv1->count_pass = $cv2[0]->count;
            else $cv1->count_pass = 0;
            $cv1->month = 'Tháng '.$cv1->month;
        }

        $cv = $cv->toArray();

        $cv_upload = array_column($cv, 'count');
        $month = array_column($cv,'month');
        $cv_pass = array_column($cv, 'count_pass');

        $cv_upload = json_encode($cv_upload,JSON_NUMERIC_CHECK);
        $cv_pass = json_encode($cv_pass,JSON_NUMERIC_CHECK);
        $month = json_encode($month,JSON_NUMERIC_CHECK);
        $text = 'Thống kê CV theo tháng';
        return array($cv_upload, $cv_pass,$month, $text);
    }

    public function statisticPositions($datestart, $dateend,$key)
    {
        if($key == ''){
            $cv = CV::select(DB::raw("count(id) as count, apply_to positions"))
                ->where('created_at', '>=', $datestart)
                ->where('created_at', '<=', $dateend)
                ->groupBy(DB::raw('apply_to'))
                ->get();

            // $cv = DB::table('cvs')->join('positions', 'cvs.apply_to', '=', 'positions.id')
            // ->select(DB::raw("count(cvs.id) as count, cvs.apply_to as po, positions.name as name"))
            // ->where('cvs.created_at', '>=', $datestart)
            // ->where('cvs.created_at', '<=', $dateend)
            // ->groupBy(DB::raw('apply_to'))
            // ->get();
            // return $cv;
            
            foreach ($cv as $cv1) {
                $cv2 = CV::select(DB::raw("count(id) as count"))
                ->where('created_at', '>=', $datestart)
                ->where('created_at', '<=', $dateend)
                ->where('Status', '=', 14)
                ->where('apply_to', '=', $cv1->positions)
                ->get();
                if($cv1 != null)
                    $cv1->count_positions_pass = $cv2[0]->count;
                else $cv1->count_positions_pass = 0;
                if($cv1->positions != null){
                    $name = DB::table('positions')
                    ->where('id', '=', $cv1->positions)->get();
                    $cv1->positions = $name[0]->name;
                }
            }
        } else {
            $cv = CV::select(DB::raw("count(id) as count, apply_to positions"))
                ->where('created_at', '>=', $datestart)
                ->where('created_at', '<=', $dateend)
                ->where('apply_to', '=', $key)
                ->get();
    
            foreach ($cv as $cv1) {
                $cv2 = CV::select(DB::raw("count(id) as count"))
                ->where('created_at', '>=', $datestart)
                ->where('created_at', '<=', $dateend)
                ->where('Status', '=', 14)
                ->where('apply_to', '=', $key)
                ->get();
                if($cv1 != null)
                    $cv1->count_positions_pass = $cv2[0]->count;
                else $cv1->count_positions_pass = 0;
                if($cv1->positions != null){
                    $name = DB::table('positions')
                    ->where('id', '=', $cv1->positions)->get();
                    $cv1->positions = $name[0]->name;
                }
            }
        }

        $cv= $cv->toArray();

        $positions = array_column($cv, 'positions');
        $count_positions = array_column($cv, 'count');
        $count_positions_pass = array_column($cv, 'count_positions_pass');

        $positions = json_encode($positions,JSON_NUMERIC_CHECK);
        $count_positions = json_encode($count_positions,JSON_NUMERIC_CHECK);
        $count_positions_pass = json_encode($count_positions_pass,JSON_NUMERIC_CHECK);
        $text = 'Thống kê CV theo vị trí apply to';

        return array($count_positions, $count_positions_pass, $positions,$text);
    }

    public function statisticSearch(Request $request)
    {
        $datestart = $request->input('startDate');
        $datestart = $datestart.' 00:00:00';

        $dateend = $request->input('endDate');
        $dateend = $dateend.' 00:00:00';
        $key = $request->input('key_search');
    
        list($cv_upload, $cv_pass, $ox, $text) = $this->statisticPositions($datestart, $dateend,$key);

        return View::make('includes.positions_chart')
            ->with('ox', $ox)->with('cv_upload', $cv_upload)
            ->with('cv_pass', $cv_pass)->with('text', $text);
    }

    public function statisticStatus(Request $request)
    {
        $ox = $request->input('ox');
        switch ($ox) {
            case 'month':
                list($cv_upload, $cv_pass, $ox, $text) = $this->statisticMonth();
                break;
            case 'quarter':
                list($cv_upload, $cv_pass, $ox, $text) = $this->statisticQuarter();
                break;
            case 'year':
                list($cv_upload, $cv_pass, $ox, $text) = $this->statisticYear();
                break;
            case 'position':
                $day = date('Y-m-d H:i:s');
                $year = getYear($day);
                $month = getMonth($day);
                $month1 = $month +1;
                $datestart = $year.'-'.$month.'-01 00:00:00';
                $dateend = $year.'-'.$month1.'-01 00:00:00';
                list($cv_upload, $cv_pass, $ox, $text) = $this->statisticPositions($datestart, $dateend,'');
                break;
        }

        return View::make('includes.positions_chart')
            ->with('ox', $ox)->with('cv_upload', $cv_upload)
            ->with('cv_pass', $cv_pass)->with('text', $text);
    }
}