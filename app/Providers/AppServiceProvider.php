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
        view()->composer(['about','xCV.template'], function($view){
            if (Auth::check()) {
                $user = Auth::user();
                $cv = $user->CV;
                $list = CV::whereHas('User', function($q) use($user)
                {
                    $q->whereHas('User', function($q) use($user)
                    {
                        $q->where('user_id', $user->id);
                    });
                })->take(10)->get();
                if (Gate::allows('get-cv', $cv)) {
                    $view->with('CV', $cv)->with('list',$list);
                }else
                {
                    $view->with('list',$list);
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
