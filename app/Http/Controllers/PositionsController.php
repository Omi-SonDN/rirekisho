<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Positions;
use Illuminate\Support\Facades\Response;
use Gate;

class PositionsController extends Controller
{

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        
        $this->validate($request, [
            'name' => 'required|max:255|unique:positions,name',
        ]);

        $position = new Positions();
        $position->name = $request->name;
        if ($request->active == "true") {
            $position->active = 1;
        }
        if ($request->active == "false") {
            $position->active = 0;
        }

        $position->save();

//        Session::flash('flash_message', 'Position has been saved.');
        return Response::json($position);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        
        $position = Positions::findorfail($id);

        return Response::json($position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        $position = Positions::findorfail($id);
        
        if($position->name != $request->name) {
        $this->validate($request, [
            'name' => 'required|max:255|unique:positions,name',
        ]);
        
        $position->name = $request->name;
        }
        
        if ($request->active == "true") {
            $position->active = 1;
        }
        if ($request->active == "false") {
            $position->active = 0;
        }

        $position->update();

//        Session::flash('flash_message', 'Position has been updated.');
        return Response::json($position);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        
        $position = Positions::findorfail($id);
        
        $position->delete();
        
//        Session::flash('flash_message', 'Position has been deleted.');
        return Response::json($position);
    }
}
