<?php

namespace app\Http\Controllers\Auth;

use Auth;
use DB;
use App\CV;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Session, Cache;

class AuthController extends Controller
{
    public function __construct(Guard $auth, User $user)
    {
        $this->user = $user;
        $this->auth = $auth;
        $this->middleware('guest', ['except' => [ 'getLogout', 'myLogout', 'logout']]);
    }

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectTo = 'auth/login';
    protected $user;
    protected $auth;

    protected function create(array $data)
    {
        return User::create(['userName' => $data ['userName'], 'email' => $data ['email'],
            'password' => bcrypt($data ['password']),]);
    }

    public function getLogin()
    {
        return view('xAuth.login');
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), User::$login_rules, User::$messageRegister);

        if ($validator->fails()) {
            return redirect('auth/login')->withErrors($validator)->withInput($request->except(['password']));
        } else {
            $userdata = array('email' => $request->input('email'), 'password' => $request->input('password'));
            if (Auth::attempt($userdata)) {
                if (Auth::user()->getRole() == "Applicant" || Auth::user()->getRole() == "SuperAdmin"|| Auth::user()->getRole() == "Admin") {
                    if(is_null(Auth::user()->CV)) {
                        //DB::table('cvs')->insert(['user_id' => Auth::user()->id, 'email' => Auth::user()->email]);
                    }
                    // $cv_active = CV::with('User')
                    //     ->with('positionCv')
                    //     ->with('status')
                    //     ->join('users', 'users.id', '=', 'cvs.user_id')
                    //     ->where('cvs.Active', '=', 0)
                    //     ->get();
                    // Session::put('CVTB',$cv_active);

                }
                return redirect('/');//->withInput($userdata);
            }

            return redirect('auth/login')
                ->withInput($request->except(['password']))
                ->with([
                    'flash_level' => 'danger',
                    'message' => 'Email hoặc mật khẩu không đúng'
                ]);
        }
    }

    public function getRegister()
    {
        return view('xAuth.register');
    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), User::$rules, User::$messageRegister);
        if ($validator->fails()) {
            return redirect('auth/register')->withErrors($validator)->withInput($request->all());
        }
        $user = $this->create($request->all());
        $user->role = 0;
        $user->save();

        return redirect('auth/login')
            ->withInput($request->except(['password', 'password_confirmation']))
            ->with([
                'flash_level' => 'success',
                'message' => 'Bạn đã đăng ký thành công'
            ]);
    }

    public function getLogout()
    {
        if (Auth::check()) {
            Session::flush();
            Cache::flush();
            Auth::logout();

            return redirect()->action('FrontEnd\WellController@index');
        } else
            return redirect()->action('FrontEnd\WellController@index');
//            return redirect()->action('Auth\AuthController@getLogin');
    }

    public function myLogout()
    {
        //$this->auth->logout();
        if (Auth::check()) {
            Session::flush();
            Cache::flush();
            Auth::logout();

            return redirect()->action('FrontEnd\WellController@index');
        } else
            return redirect()->action('FrontEnd\WellController@index');
    }
}
