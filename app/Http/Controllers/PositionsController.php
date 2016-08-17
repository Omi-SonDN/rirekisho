<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Positions;
use Illuminate\Support\Facades\Response;
use Gate;
use Input;
use Session;
use Validator;

class PositionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('SuperAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        $positions = Positions::paginate(10);

        $data = array(
            'positions' => $positions,
        );

        return view('positions.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        return View('positions.add');
    }

     public function create()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        global $request;
        $rules = array(
            'name'=> 'required|unique:positions,name',
            'active' => 'required',
            'description' => 'required'
        );
        $validator = Validator::make($request->all(),$rules);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $positions = new Positions();
            $positions->name = $request->name;
            $positions->active = $request->get('active') ? $request->get('active'):0;
            $positions->description = $request->description;
            $positions->save();
        }
        
        return redirect()
            ->route('position::list')
            ->with(
                [
                    'flash_level' => 'success',
                    'message' => 'Đã thêm vị trí tuyển dụng thành công'
                ]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        $position = Positions::findorfail($id);

        //return Response::json($position);
        return view('positions.edit')->with('Positions', $position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        $position = Positions::findorfail($id);
        $rules = array(
            'active' => 'required',
            'description' => 'required'
        );
        if( $position->name != $request->name){
            $rules['name'] = 'required|unique:positions,name';
        }
        $validator = Validator::make($request->all(),$rules);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else { 
            $position->name = $request->name;
            if ($request->active) {
                $position->active = 1;
            } else {
                $position->active = 0;
            }
            $position->description = $request->description;
        }

        $position->update();
        return redirect()
            ->route('position::list')
            ->with(
                [
                    'flash_level' => 'success',
                    'message' => 'Đã sửa thành công'
                ]
            );
//        Session::flash('flash_message', 'Position has been updated.');
        //return Response::json($position);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        $position = Positions::findorfail($id);

        $position->delete();
        return redirect()
            ->route('position::list')
            ->with(
                [
                    'flash_level' => 'success',
                    'message' => 'Đã xóa thành công'
                ]
            );

//        Session::flash('flash_message', 'Position has been deleted.');
        //return Response::json($position);
    }
    public function view($id){
        $position = Positions::findorfail($id);
        return view('positions.view')->with('Positions', $position);
    }
}
