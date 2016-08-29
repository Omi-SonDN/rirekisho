<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Group;
use Gate;
use Illuminate\Support\Facades\Response;
use Input;
use Session;
use Validator;
use DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Gate::denies('Admin')) {
            abort(403);
        }
        $group = Group::paginate(10);
        $data = array(
            'Group' => $group,
        );
        return view('group.index',isset($data)?$data:NULL)->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        return view('group.add');
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

        global $request;
        $rules = array(
            'name' => 'required|unique:group,name'
        );
         $validator = Validator::make($request->all(),$rules);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $group = new Group();
            $group->name = $request->name;
            $group->parent = $request->parent;
            $group->save();
        }
        return redirect()
        ->route('group.create')
        ->with(
            [
                'flash_level' => 'success',
                'message' => 'Đã thêm nhóm người dùng thành công!'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::findorfail($id);
        return view('group.view')->with('Group', $group);
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
        $group = Group::findorfail($id);
        return view('group.edit')->with('Group', $group);
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

        $group = Group::findorfail($id);

        $rules = array();
        if( $group->name != $request->name){
            $rules['status'] = 'required|unique:group,name';
        }
        $validator = Validator::make($request->all(),$rules);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $group->name = $request->name;
            $group->parent = $request->parent;
        }
        $group->save();
        return redirect()
        ->route('group.index')
        ->with(
            [
                'flash_level' => 'success',
                'message' => 'Đã sửa nhóm người dùng thành công'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        //remove parent
        $groups = Group::where('parent',$id)->get();
        foreach($groups as $group){
            $group->parent = null;
            $group->save();
        }
        Group::destroy($id);

        return redirect()
        ->route('group.index')
        ->with(
            [
                'flash_level' => 'success',
                'message' => 'Đã xóa nhóm người dùng hành công'
            ]
        );
    }
}
