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
            $_field = 'name';
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

        list($CVs, $get_paging)= $this->paginationCV($s_name, $apply_to, $status, $_field, $_sort, $_numpage);
        $count = $CVs->count();

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

        list($CVs, $get_paging)= $this->paginationCV($name, $positions, $Status, $request->input('data-field'), $request->input('data-sort'), $request->input('entrie'));
        $count = $CVs->count();

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
    public function paginationCV ($name = '', $positions = null, $Status = null, $_field = 'name', $data_sort = 'asc', $_numpage = 10)
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
            $none_field = 'name';
        }

        $CVs = CV::with('User')
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
            })
            ->orderBy($_field, $bc)
            ->paginate($_numpage);

        $paging = new Pagination_temp();

        $paging->class_pagination = "light-theme simple-pagination pagination";// ĐẶT CLASS CHO THÀNH PHẦN PHÂN TRANG THEO Ý MUỐN
        $paging->class_active = "current"; // TEN CLASS Active
        $paging->page = $CVs->currentPage();// TRANG HIỆN TẠI
        $paging->total = $CVs->total(); // TONG SO PAGE
        $paging->per_page=$_numpage; // SỐ RECORD TRÊN 1 TRANG default = 10
        $paging->adjacents = 3; // SỐ PAGE  CENTER DEFAULT = 3
        $paging->name_page ='page'; // GET NAMEPAGE  LẤY GIÁ TRỊ PAGE THÔNG QUA PHƯƠNG THỨC POST OR GET
        $paging->name_per_page ='per_page'; // GET NAMEPAGE  LẤY GIÁ TRỊ PAGE THÔNG QUA PHƯƠNG THỨC POST OR GET
        $paging->url_modify= Pagination_temp::cn_url_modify('search='.$name, 'status='.$Status, 'apply_to='.$positions, 'data-field='.$none_field, 'data-sort='.$bc, 'per_page', 'page');//	THÔNG SỐ SUA URL VOI FUNCTION CN_URL_MODIFY

        //goi...
        return array($CVs ,$paging->Load());

    }
}