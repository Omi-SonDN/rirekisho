<?php

namespace app\Http\Controllers\Auth;

use Auth;
use DB;
use CV;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectTo = 'auth/login';
    protected $user;
    protected $auth;

    public function __construct(Guard $auth, User $user)
    {
        $this->user = $user;
        $this->auth = $auth;
        $this->middleware('guest', ['except' => ['getLogout','myLogout','logout']]);
    }
    protected function create(array $data)
    {
        return User::create(['name' => $data ['name'], 'email' => $data ['email'],
          'password' => bcrypt($data ['password']), ]);
    }

    public function getLogin()
    {
        return view('xAuth.login');
    }
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), User::$login_rules);

        if ($validator->fails()) {
            return redirect('auth/login')->withErrors($validator)->withInput($request->except(['password'])); 
        } else {
            $userdata = array('email' => $request->input('email'), 'password' => $request->input('password'));
            if (Auth::attempt($userdata)) {
                return redirect('/');//->withInput($userdata);
            }

            return redirect('auth/login')->withInput($request->except(['password']));
        }
    }

    public function getRegister()
    {
        return view('xAuth.register');
    }
    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), User::$rules);
        if ($validator->fails()) {
            return redirect('auth/register')->withErrors($validator)->withInput($request->all());
        }
        $user = $this->create($request->all());
        $user->role = 0;
        $user->save();
        $CV = DB::table('CV')->insert(['user_id' => $user->id]);
        return redirect('auth/login')->withInput($request->except(['password']));
    }

    public function myLogout()
    {
        //$this->auth->logout();
        if (Auth::check()) {
            Session::flush();
            Auth::logout();
             
            return redirect()->action('Auth\AuthController@getLogin');
        }
        else
            return redirect()->action('Auth\AuthController@getLogin');
    }
}
