<?php

namespace app\Http\Controllers;

use Auth;
use Cache;
use DB;
use Illuminate\Http\Request;
use View;
use Gate;
use PDF;
use Response;
use App\Positions;
use Route;
use App\CV;
use App\Record;
use App\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\MyLibrary\Pagination_temp;

class CVController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search') ) {
            $s_name = $request->get('search');
            $s_name = preg_replace('/\'/', '', $s_name);
        } else {
            $s_name = '';
        }

        if ($request->has('apply_to') ) {
            $apply_to = (int)$request->get('apply_to');
        }else {
            $apply_to = null;
        }

        if ($request->has('status') ) {
            $status = (int)$request->get('status');
        }else {
            $status = null;
        }

        if ($request->has('data-field') ) {
            $_field = $request->get('data-field');
        }else {
            $_field = 'id';
        }

        if ($request->has('data-sort') ) {
            $_sort = $request->get('data-sort');
        }else {
            $_sort = 'asc';
        }

        if ($request->has('per_page') ) {
            $_numpage = (int)$request->get('per_page');
            if ($_numpage <= 0) $_numpage = 10;
        }else {
            $_numpage = 10;
        }

         if ($request->has('page') ) {  
            $_page = (int)$request->get('page'); 
        } else{
            $_page = 1;
        }


        list($CVs, $get_paging)= $this->paginationCV($s_name, $apply_to, $status, $_field, $_sort, $_page, $_numpage);
        $count = count($CVs);


        if (Auth::user()->getRole() === 'Visitor'){
            $_Position = Positions::actives()->get();
        } else {
            $_Position = Positions::all();
        }

        return view('xCV.CVindex', compact('CVs', 'count', '_numpage', 'get_paging', '_Position'));
    }

    /*********Advance Search**************/
    public function adSearch(Request $request){

        if (Gate::denies('Visitor')) {
            abort(403);
        }

        $positions = $request->input('positionsSearch');
        $name = $request->input('nameSearch');
        $Status = $request->input('statusSearch');

        if ($request->has('page') ) {  
            $_page = (int)$request->get('page'); 
        } else{
            $_page = 1;
        }

        list($CVs, $get_paging)= $this->paginationCV($name, $positions, $Status, $request->input('data-field'), $request->input('data-sort'), $_page, $request->input('entrie'));
        $count = count($CVs);

        if (Auth::user()->getRole() === 'Visitor'){
            $_Position = Positions::actives()->get();
        } else {
            $_Position = Positions::all();
        }
        return Response::json(array(
                'data'=>view('includes.table-result', compact('CVs', 'count', '_numpage', '_Position'))->render(),
                'pagination'=> $get_paging,
                'url'=> \URL::action('CVController@index')
            )
        );
    }

    public function show($id)
    {
        //$id = $id - 14000;
        $CV = CV::with('User')->find($id);
        if (Gate::denies('view-cv', $CV)) {
            abort(403);
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

    public function show2($id)
    {
        //$id = $id - 14000;
        $CV = CV::with('User')->find($id);
        if (Gate::denies('view-cv', $CV)) {
            abort(403);
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
        return View::make('xCV.CVview')
            ->with(compact('CV', 'Records', 'skills', 'image', 'bookmark'));
    }

    public function edit($id)//Get
    {
        //$id = $id - 14000;
        $cv = CV::findOrFail($id);
        if (Gate::denies('update-cv', $cv->user_id)) {
            abort(403);
        }
        $skills = $cv->Skill;
        $Records = $cv->Record;
        $Records = $Records->sortBy("Date");
        return View::make('xCV.CVcreate')->with('CV', $cv)->with('Records', $Records)->with('skills', $skills);
    }

    public function update($id, UpdateRequest $request)//PUT
    {
        //$id = $id - 14000;

        $cv = CV::findOrFail($id);
        if (Gate::denies('update-cv', $cv->user_id)) {
            abort(403);
        }
        if ($request->has('B_date')) {
            $cv->Birth_date = getDateDate($request->input('B_date'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return view('xCV.CVcreate');
    }

    public function store($id, Request $request)
    {
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
        }

        $CV->status = $request->status;
        $CV->update();

        //return \Illuminate\Support\Facades\Response::json($CV);
        return \Illuminate\Support\Facades\Response::json(array(
                'CV'=> $CV,
                'url'=> \URL::previous()
            )
        );
    }
    /// Custom by BQN  
    /// $name tim kiem theo ten
    /// $positions  tim theo vi tri tuyen dung
    /// $Status trang thai cua cv
    // Mac dinh sap xep theo ten tang dan voi 10 bang ghi tren mot trang
    public function paginationCV ($name = '', $positions = null, $Status = null, $_field = 'id', $data_sort = 'asc', $_page = 1, $_numpage = 10)
    {
        if($data_sort == "desc") {
            $bc = 'desc';
        } else {
            $bc = 'asc';
        }

        $str_po = $str_role = $str_or = $str_and = array();
        if ($Status != '') {
            $str_and['status'] = $Status;
        } else {
            if (Auth::user()->getrole() === 'Visitor') {
                $str_role = [1, 2];
            }
        }
        if ($positions) {
            $str_po['apply_to'] = $positions;
        }
        if ($name) {
            $name = preg_replace('/\'/', '', $name);
            $str_or['First_name'] = $name;
            $str_or['Last_name'] = $name;
        }

        if($_field) {
            if ($_field == 'name') {
                $_field = 'Last_name';
                $none_field = 'name';
            }else {
                $none_field = $_field;
            }
        }else {
            $_field = 'Last_name';
            $none_field = 'id';
        }

        $CV1 = CV::with('User')
            ->where(function ($query) use ($name) {
                if ($name) {
                    $query->orwhere('First_name', 'like', '%' . $name . '%')
                        ->orwhere('Last_name', 'like', '%' . $name . '%');
                }
            })
            ->where($str_po)
            ->where(function ($query) use ($str_and, $str_role) {
                if ($str_and) {
                    $query->where($str_and);
                } else if ($str_role) {
                    $query->whereIn('status', $str_role);
                } else {

                }
            })->get();

        if($none_field == 'name'){
            if($bc == 'asc')
                $CV1 = $this->ASC($CV1);
            else $CV1 = $this->DESC($CV1);
        } else{
            if($none_field == 'id')
                $CV1 = $CV1->sortByDesc($none_field);
            else{
                if($bc == 'desc')
                    $CV1 = $CV1->sortBy($none_field);
                else $CV1 = $CV1->sortByDesc($none_field);
            }
        }

        $url_modify = Pagination_temp::cn_url_modify('search='.$name, 'status='.$Status, 'apply_to='.$positions, 'data-field='.$none_field, 'data-sort='.$bc, 'per_page', 'page');
        list ($cvs, $get_paging) = Pagination_temp::cn_arr_pagina($CV1, $url_modify, $_page, $_numpage);

        return array($cvs, $get_paging);
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
            $CVs[$i]->fullname = $CVs[$i]->ten.' '.$CVs[$i]->Last_name.' '.$CVs[$i]->dem;
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
            $CVs[$i]->fullname = $CVs[$i]->ten.' '.$CVs[$i]->Last_name.' '.$CVs[$i]->dem;

        }
        $CVs = $CVs->sortBy('fullname');
        return $CVs;
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