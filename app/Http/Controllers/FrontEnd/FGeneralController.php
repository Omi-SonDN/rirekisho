<?php

namespace app\Http\Controllers\FrontEnd;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fgeneral;
use Validator;
use Session;
use DB;

class FGeneralController extends Controller
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
        $settings = FGeneral::all()->keyBy('key');
        return View('FrontEnd.settings')->with(['setting'=>$settings]);
    } 

    public function update()
    {
        global $request;
        $rules = array(
            'email'=> 'required|email',
            'ominext' => 'required',
            'logo' => 'required',
        );
        $validator = Validator::make($request->all(),$rules);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            \DB::table("f_general")->where('key','email')->update(['value'=>$request->email]);
            \DB::table("f_general")->where('key','ominext')->update(['value'=>$request->ominext]);
            
            if ($request->file('logo')->isValid()) {
                $arr['logo'] = $_FILES['logo']['name'];
                $url = 'public/frontend/img/'.$_FILES['logo']['name'];
                $request->file('logo')->move('public/frontend/img/', $_FILES['logo']['name']);
                DB::table('f_general')->where('key','logo')->update(['value'=>$url]);
            } else{
                Session::flash('error','Anh khong dung dinh dang');
            }
        }
        return redirect()
            ->route('fgeneral::list')
            ->with(
                [
                    'flash_level' => 'success',
                    'message' => 'Đã thêm thành công'
                ]
            );
    }
}

