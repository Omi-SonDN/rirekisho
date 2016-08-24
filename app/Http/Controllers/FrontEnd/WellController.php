<?php

namespace app\Http\Controllers\FrontEnd;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Compnaies;
use App\User;
use App\Slide;
use App\Positions;
use App\CV;
use App\Fgeneral;
use Validator;

class WellController extends Controller
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
        $settings = Fgeneral::all()->keyBy('key');
        $slides = Slide::orderBy('order')->get();
        $positions = Positions::take(6)->get();
        $configcp = Compnaies::first();
        $pCV = array();
        if (\Auth::check()) {
            $pCV = CV::with('User')
                ->where('user_id', \Auth::user()->id)
                ->get();
        }
        $isslider = 1;
       return view('FrontEnd.pages.home', compact('configcp', 'isslider', 'pCV','slides','positions','settings'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendMailContact(Request $request){
        $rules = array(
            'name'=> 'required',
            'email' => 'required|email',
            'message' => 'required|min:20|max:256'
        );
        $validator = Validator::make($request->all(),$rules);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->email;
            $name = $request->name;
            $message = $request->message;
            $settings = Fgeneral::all()->keyBy('key');
            $to = $settings->get('email')->value;

            \Mail::send('emails.contact', ['mymessage' => $message], function ($m) use ($request, $email, $name, $message, $to) {
                $m->from($email,$name);
                $m->to($to)->subject('[Contact] Contact me now!');
            });
        }
            return redirect()
                ->back()
                ->with(
                    [
                        'flash_level' => 'success',
                        'message' => 'Cảm ơn bạn đã gửi message đến cho chúng tôi! Chúc bạn luôn thành công!'
                    ]
                );
            }
}

