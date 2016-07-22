<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Groups;
use app\User;
use Session;
use Gate;
use Illuminate\Support\Facades\Response;

class GroupsController extends Controller
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
        
        $groups = Groups::orderBy('name')->paginate(10);

        $data = array(
            'groups' => $groups,
        );

        return view('groups.index')->with($data);
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
            'name' => 'required|max:255|unique:groups',
        ]);

        $group = new Groups;
        $group-> name = $request->name;
        $group->save();

        return Response::json($group);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        
        $group = Groups::with(['users' => function($query) {
                    $query->orderBy('name', 'DESC');
                }])->findorfail($id);

        return Response::json($group);
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
        
        $group = Groups::findorfail($id);

        return Response::json($group);
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
        
        $group = Groups::findorfail($id);

        if ($group->name != $request->name) {
            $this->validate($request, [
                'name' => 'required|max:255|unique:groups',
            ]);

            $group->name = $request->name;
        }
        
        $group->update();

        return Response::json($group);
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
        
        $group = Groups::findorfail($id);

        $group->delete();

        return Response::json($group);
    }
    
    /**
     * get username ajax
     * 
     * @param Request $request
     * @return type
     */
    public function getUsername(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        
        $key = $request->term;
        
        $Usernames = User::select('name', 'email')
            ->where('email', 'like' , '%'.$key.'%')
            ->orWhere('name', 'like', '%'.$key.'%')
            ->get();
        
        return Response::json($Usernames);
    }
    
    /**
     * update group's member
     * 
     * @param Request $request
     * @return int
     */
    public function updateListMember(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        
        //detach all member
        $group = Groups::findorfail($request->group_id);
        $group->users()->detach();
        
        //attach new member
        $username = explode(',', $request->members);
        
        foreach ($username as $user)
        {
            $user = User::where('name', '=', $user)->first();
            $group->users()->attach($user['id']);
        }
        
        return 1;
    }
}
