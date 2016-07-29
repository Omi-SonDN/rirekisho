<?php

namespace app\Http\Controllers;

use Auth;
use Cache;
use DB;
use Illuminate\Http\Request;
use View;
use Gate;
use PDF;
use App\CV;
use App\Record;
use App\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use Nicolaslopezj\Searchable\SearchableTrait;

class CVController extends Controller
{

    public function index(Request $request)
    {
        //TODO: sửa view
        $str_po = $str_role = array();
        if (Auth::user()->getrole() === 'Visitor') {
            $str_role = [0];
            $str_po = [1, 2];
        }
        //$CVs = CV::with('User')->active()->paginate(10);
        $CVs = CV::with('User')
            ->where(function ($query) use ($str_role) {
                if (count($str_role)) {
                    $query->whereNotIn('status', $str_role);
                } else {

                }
            })->where(function ($query) use ($str_po) {
                if (count($str_po)) {
                    $query->whereIn('status', $str_po);
                } else {

                }
            })
            ->paginate(5);

        $count = $CVs->count();
        return view('xCV.CVindex', compact('CVs', 'count'));
    }

    /*********Advance Search**************/
    public function adSearch(Request $request){

        if (Gate::denies('Visitor')) {
            abort(403);
        }
        if(!$per_page = $request->input('entrie')) {
            $per_page = 10;
        }
        $positions = $request->input('positionsSearch');
        $name = $request->input('nameSearch');
        $Status = $request->input('statusSearch');

        if($request->input('data-sort') == "desc") {
            $bc = 'DESC';
        } else {
            $bc = 'ASC';
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
            $str_or['First_name'] = $name;
            $str_or['Last_name'] = $name;
        }
        $_name ='Last_name';
        if($request->has('data-field')) {
            $_name = $request->input('data-field');
            if ($_name === 'name') {
                $_name = 'Last_name';
            }
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
            ->orderBy($_name, $bc)
            ->paginate($per_page);

        $count = $CVs->count();
        return View::make('includes.table-result',  compact('CVs', 'count'));
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
        $CV = CV::findorfail($request->id);
        $CV->status = $request->status;
        $CV->update();

        return \Illuminate\Support\Facades\Response::json($CV);
    }
}