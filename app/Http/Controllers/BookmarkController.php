<?php

namespace App\Http\Controllers;


use Auth;
use DB;
use Illuminate\Http\Request;
use App\CV;
use app\User;
use Gate;
use App\Http\Controllers\Controller;
use View;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('Visitor')) {
            abort(403);
        }

        $user_id = Auth::user()->id;
        $list = CV::whereHas('User', function ($q) use ($user_id) {
            $q->whereHas('User', function ($q) use ($user_id) {
                $q->where('user_id', $user_id);
            });
        })->get();

        if (Gate::allows('Admin')) {
            $CV = Auth::user()->CV;
        }

        // kiem tra bookmark
        // Visitor: xoa bo nhung cv chua duoc kich hoat
        // hoac cv cho phep chu nha tuyen dung tim kiem
        if(Auth::user()->getRole() == 'Visitor') {
            foreach ($list as $kr => $its){
                if ($its->Active == 0 || $its->live == 0) {
                    unset($list[$kr]);
                }
            }
        }

        // kiem tra bookmark
        // Admin: xoa bo nhung cv chua cho phep tuyen dung tim kiem
        if(Auth::user()->getRole() == 'Admin') {
            foreach ($list as $kr => $its) {
                if ($its->live == 0) {
                    unset($list[$kr]);
                }
            }
        }

        return View::make("includes.sidebar")->with(compact("list", 'CV'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    public function destroy($id, Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//post
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::denies('Visitor')) {
            abort(403);
        }
        $user = Auth::User();

        $bookmark = DB::table('bookmarks')
            ->whereUserId($user->id)
            ->whereBookmarkUserId($id)->first();


        if ($bookmark === null) {
            return 0;
        } else {
            return 1;
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)//PUT
    {
        if (Gate::denies('Visitor')) {
            abort(403);
        }
        $bookmarkid = $id;
        $user = Auth::User();

        $bookmark = DB::table('bookmarks')
            ->whereUserId($user->id)
            ->whereBookmarkUserId($bookmarkid)->first();

        if ($bookmark === null) {
            $user->Bookmark()->attach($bookmarkid);
            return 1;
        } else {
            $user->Bookmark()->detach($bookmarkid);
            return 0;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


}
