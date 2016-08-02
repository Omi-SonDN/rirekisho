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
use App\CV;
use App\Record;
use App\Status;
use App\Positions;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use Nicolaslopezj\Searchable\SearchableTrait;
use Vinkla\Hashids\Facades\Hashids;

class CVController extends Controller
{

    public function index(Request $request)
    {

        //TODO: sửa view 
        //$CVs = CV::with('User')->active()->paginate(10);
        $CVs = CV::with('User')->active()->get();
        $CVs->perPage = 5;

        return view('xCV.CVindex', compact('CVs'));
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
        dd($result->groupBy(function($item,$key){
            return $item->created_at;
        }));
        return view('xCV.resort', compact('CVs'),['result'=>$result,'startdate'=>trim($request->startdate),'enddate'=>trim($request->enddate)]);
    }
    public function search1(Request $request)
    {
        if (Gate::denies('Visitor')) {
            abort(403);
        }
        if ($request->has("data-sort")){
            //$CVs = CV::with('User')->paginate(5);
            if($request->input('data-field') == "name"){
                $CVs = CV::with('User')->get();
                if($request->input('data-sort') == "asc"){ 
                    $CVs = CV::SortByNameDesc('', 'Status', 'Vị trí tuyển dụng');
                } else $CVs = CV::SortByNameAsc('', 'Status', 'Vị trí tuyển dụng');
               // for($i = 0; $i < $CVs->count(); $i++)
                   // $CVs[$i] = $CVs1[$i];   
            } else {
                $CVs = CV::with('User')->orderBy($request->input('data-field'), $request->input('data-sort'))->get();
            }        
        }
    
        $CVs->perPage = $request->input('entrie');
        return View::make('includes.table-result',  compact('CVs'));
    }

    /************Search Name*************/
    public function search(Request $request)
    {
         if (Gate::denies('Visitor')) {
            abort(403);
        }

        $name = $request->input('keyword');
        $CVs = CV::with('User')->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->get();

        if ($request->has("data-sort")){
            if($request->input('data-field') == "name"){
                if($request->input('data-sort') == "desc"){ 
                    $CVs = CV::SortByNameDesc($name, 'Status', 'Vị trí tuyển dụng');
                } else $CVs = CV::SortByNameAsc($name, 'Status', 'Vị trí tuyển dụng');
            } else {
                $CVs = CV::with('User')->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->orderBy($request->input('data-field'), $request->input('data-sort'))->get();
            }
        }   
        //$CVs->perPage = 5;
        $CVs->perPage = $request->input('entrie');
        return View::make('includes.table-result',  compact('CVs'));
    }


    /*********Advance Search**************/
    public function adSearch(Request $request){

        if (Gate::denies('Visitor')) {
            abort(403);
        }

        $positions = $request->input('positionsSearch');
        $name = $request->input('nameSearch');
        $Status = $request->input('statusSearch');
        
        if($Status != 'Status'){
            $cv_status = DB::table('status')->where('status',$Status)->get();
            $Status = $cv_status[0]->id;
        
            if($name != ''){
                if($positions != 'Vị trí tuyển dụng')
                    $CVs = CV::with('User')->where('positions', $positions)->where('status', $Status)->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->get();
                else $CVs= CV::with('User')->where('status', $Status)->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->get();
            } else {
                if($positions != 'Vị trí tuyển dụng')
                    $CVs = CV::with('User')->where('positions', $positions)->where('status', $Status)->get();
                else $CVs = CV::with('User')->where('status', $Status)->get();
            }
        } else {
            if($name != ''){
                $CVs = CV::with('User')->where('positions', $positions)->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->get();
            } else {
                $CVs = CV::with('User')->where('positions', $positions)->get();
            }
        }

        if ($request->has("data-sort")){
            if($request->input('data-field') == "name"){
                if($request->input('data-sort') == "desc"){ 
                    $CVs = CV::SortByNameDesc($name, $Status, $positions);
                } else $CVs = CV::SortByNameAsc($name, $Status, $positions);
            } else {
                // if ($request->input('data-sort') == "desc") {
                //     $CVs = $CVs->sortBy($request->input('data-field'));
                // } else $CVs = $CVs->sortByDesc($request->input('data-field'));
                if($Status != 'Status'){
                    if($name != ''){
                        if($positions != 'Vị trí tuyển dụng')
                            $CVs = CV::with('User')->where('positions', $positions)->where('status', $Status)->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->orderBy($request->input('data-field'), $request->input('data-sort'))->get();
                        else $CVs= CV::with('User')->where('status', $Status)->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->orderBy($request->input('data-field'), $request->input('data-sort'))->get();
                    } else {
                        if($positions != 'Vị trí tuyển dụng')
                            $CVs = CV::with('User')->where('positions', $positions)->where('status', $Status)->get();
                        else $CVs = CV::with('User')->where('status', $Status)->orderBy($request->input('data-field'), $request->input('data-sort'))->get();
                    }
                } else {
                    if($name != ''){
                        $CVs = CV::with('User')->where('positions', $positions)->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->orderBy($request->input('data-field'), $request->input('data-sort'))->get();
                    } else {
                        $CVs = CV::with('User')->where('positions', $positions)->orderBy($request->input('data-field'), $request->input('data-sort'))->get();
                    }
                }
            }
        }   
        $CVs->perPage = $request->input('entrie');
        return View::make('includes.table-result',  compact('CVs'));
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
        $CV = CV::findorfail($request->id);
        $CV->status = $request->status;
        $CV->update();

        return \Illuminate\Support\Facades\Response::json($CV);
    }
}
