<?php

namespace app\Providers;

use app\CV;
use app\User;
use Illuminate\Support\ServiceProvider;
use Auth;
use Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer(['about', 'xCV.CVInfo', 'dashboard', 'xCV.template'], function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                // lay toan bo cv cua user dang nhap 1U -> 2CV
                $cv = $user->CV;
                $list = CV::whereHas('User', function ($q) use ($user) {
                    $q->whereHas('User', function ($q) use ($user) {
                        $q->where('user_id', $user->id);
                    });
                })
                    ->take(10)
                    //->list()
                    ->get();

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

                if (Gate::allows('get-cv', $cv)) {
                    $view->with('CV', $cv)->with('list', $list);
                } else {
                    $view->with('list', $list);
                }
            }
        });

    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
