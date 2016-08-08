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
use App\Record;
use App\Status;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use Nicolaslopezj\Searchable\SearchableTrait;
use Vinkla\Hashids\Facades\Hashids;
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

        if ($request->has('positions') ) {
            $positions = (int)$request->get('positions');
        }else {
            $positions = null;
        }

        if ($request->has('status') ) {
            $status = (int)$request->get('status');
        }else {
            $status = 1;
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

         if ($request->has('page') ) {  
            $_page = (int)$request->get('page'); 
        } else{
            $_page = 1;
        }

        list($CVs, $_Position, $get_paging)= $this->paginationCV($s_name, $positions, $status, $_field, $_sort, $_page, $_numpage);
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

        list($CVs, $_Position, $get_paging)= $this->paginationCV($name, $positions, $Status, $request->input('data-field'), $request->input('data-sort'), $_page, $request->input('entrie'));
        $count = count($CVs);

        return Response::json(array(
                'data'=>view('includes.table-result', compact('CVs', 'count', '_numpage', '_Position'))->render(),
                'pagination'=> $get_paging,
                'url'=> \URL::action('CVController@index')
            )
        );
    }

/************Search orderBy Name Positions Status Age*************/
    public function resort1(){
        if (Gate::denies('Visitor')) {
            abort(403);
        }
        return view('xCV.resort', compact('CVs'));
    }  
    public function resort(){
        if (Gate::denies('Visitor')) {
            abort(403);
        }
        global $request;
        if(!$request->startdate || !$request->enddate)
            return view('xCV.resort');
        $startdate = Carbon::createFromFormat('d/m/Y', trim($request->startdate) );
        $enddate = Carbon::createFromFormat('d/m/Y', trim($request->enddate) );
        $in = \App\CV::whereBetween('created_at',array($startdate->subDay(),$enddate))->get();
        $out =\App\CV::whereBetween('created_at',array($startdate,$enddate))->get();
        $out->each(function($item,$key) use($in) {
            $in->add($item);
        });
        
        $result = $in->sortBy(function($item,$key){return $item->created_at;})->groupBy(function($item,$key){
            return $item->created_at;
        });
        return view('xCV.resort', compact('CVs'),['result'=>$result,'startdate'=>trim($request->startdate),'enddate'=>trim($request->enddate)]);
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

        
        $cv = CV::findOrFail($id);
        if (Gate::denies('update-cv', $cv->user_id)) {
            abort(403);
        }
        $cv->update($request->all());

        if ($request->has('B_date')) {
            $cv->Birth_date = getDateDate($request->input('B_date'));
            $cv->save();
            exit();
        }
        if ($request->get('apply_to')){
            $cv->apply_to = $request->get('apply_to');
            $cv->positions = \App\Positions::find($cv->apply_to)->name;
            $cv->save();
            exit();
        }
        if ($request->hasFile('attach')) {
            $file = $request->file('attach');
            if( $file->getClientOriginalExtension() != 'pdf'){
                echo 'false';
                $cv->attach = '';
                $cv->save();
                die();
            }
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $attach = $timestamp . '-' . $file->getClientOriginalName();
            //$oldfile = public_path('attach') . $cv->attach;
            $oldattach = public_path('files/') . 'file_' . $cv->attach;
            if (\File::exists($oldattach)) {
                \File::exists($oldattach) && \File::delete($oldattach);
                //File::delete($oldfile);
            }
            //$cv->attach = $attach;
            $file->move(public_path() . '/files/', $attach);
            $cv->attach = 'public/files/'. $attach;
            $cv->save();
            //echo url('files/'. $attach);
            exit();
        }
        
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
        // if ($request->has('_potions')) {
        //     $CV->apply_to = $request->input('_potions');
        //     $CV->update();
        //     return 'true';
        //   //return \Response::json(array('url'=> \URL::previous()));

        // }
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
    public function paginationCV ($name = '', $positions = null, $Status = null, $_field = 'name', $data_sort = 'asc', $_page = 1, $_numpage = 10)
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
                $none_field = 'name';
            }else {
                $none_field = $_field;
            }
        }else {
            $none_field = 'name';
        }

        $CV1 = CV::with('User')
            ->where(function ($query) use ($name) {
                if ($name) {
                    $query->orwhere('Last_name', 'like', '%' . $name . '%')
                        ->orwhere('First_name', 'like', '%' . $name . '%');
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
            if($bc == 'desc')
                $CV1 = $CV1->sortBy($none_field);
            else $CV1 = $CV1->sortByDesc($none_field);
        }

         // remove no name or age "0000-00-00";
        // remove record no get positions actives (1) with role Visitor
        if(Auth::user()->getRole() == 'Visitor') {
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

        $url_modify = Pagination_temp::cn_url_modify('search='.$name, 'status='.$Status, 'apply_to='.$positions, 'data-field='.$none_field, 'data-sort='.$bc, 'per_page', 'page');
        list ($cvs, $get_paging) = Pagination_temp::cn_arr_pagina($CV1, $url_modify, $_page, $_numpage);

        return array($cvs, $_Position, $get_paging);
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
}