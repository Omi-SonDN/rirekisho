<?php

namespace app\Http\Controllers\FrontEnd;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slide;
use Validator;
use Session;
use DB;

class SlideController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::paginate(10);

        $data = array(
            'slides' => $slides,
        );
        return View('FrontEnd.slide.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {

        return View('FrontEnd.slide.add');
    } 

    public function create()
    {
        global $request;
        $rules = array(
            'name'=> 'required|unique:f_slide,name',
            'image' => 'required',
        );
        $validator = Validator::make($request->all(),$rules);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $slide = new Slide();
            $slide->name = $request->name;
            $slide->order = $request->get('order') ? $request->get('order'):0;
            $slide->text = $request->text;

            if ($request->file('image')->isValid()) {
                $arr['image'] = $_FILES['image']['name'];
                $url = 'public/upload/img/'.$_FILES['image']['name'];
                $request->file('image')->move('public/upload/img/', $_FILES['image']['name']);
                $slide->image = $url;
                //DB::table('f_slide')->insert(['image'=>$url]);
            } else{
                Session::flash('error','Anh khong dungd dinh dang');
            }
            $slide->save();
        }
        
        return redirect()
            ->route('slide::list')
            ->with(
                [
                    'flash_level' => 'success',
                    'message' => 'Đã thêm thành công'
                ]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $slide = Slide::findorfail($id);
        return View('FrontEnd.slide.edit')->with(['slide'=>$slide]);
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

        $slide = Slide::findorfail($id);
        global $request;
        $rules = array(
            //'image' => 'required',
        );
        if( $slide->name != $request->name){
            $rules['name'] = 'required|unique:f_slide,name';
        }
        $validator = Validator::make($request->all(),$rules);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $slide->name = $request->name;
            $slide->order = $request->get('order') ? $request->get('order'):0;
            $slide->text = $request->text;
            if ($request->has('image')){
                if ($request->file('image')->isValid()) {
                    $arr['image'] = $_FILES['image']['name'];
                    $url = 'public/upload/img/'.$_FILES['image']['name'];
                    $request->file('image')->move('public/upload/img/', $_FILES['image']['name']);
                    $slide->image = $url;
                    //DB::table('f_slide')->insert(['image'=>$url]);
                } else{
                    Session::flash('error','Ảnh không đúng định dạng!');
                }
            }
            $slide->save();
        }
        
        return redirect()
            ->route('slide::list')
            ->with(
                [
                    'flash_level' => 'success',
                    'message' => 'Đã sửa thành công'
                ]
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slide::destroy($id);
        return redirect()->back();
    }
}

