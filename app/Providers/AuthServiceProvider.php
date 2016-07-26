<?php

namespace app\Providers;

use DB;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        /**/
        $gate->define('Admin', function ($user) {
            return $user->getRole() == "Admin";
        });
        /*  Visitor's 
        */
        $gate->define('Visitor', function ($user) {
            return ($user->getRole() == "Visitor") || ($user->getRole() == "Admin");
        });
        /*  Applicant's  
        */
        $gate->define('Applicant', function ($user) {
            return $user->getRole() == "Applicant" || ($user->getRole() == "Admin");
        });
        /*
        *   from here are policies with parameter
        */
        // @param $id
        $gate->define('update-cv', function ($user, $id) {
            if ($user->getRole() == "Applicant") {
                return $user->id == $id;
            } else
                return ($user->getRole() == "Admin");

        });
        /* profile 
        */
        $gate->define('profile', function ($user, $id) {
            if ($user->getRole() == "Applicant" || $user->getRole() == "Visitor") {
                return $user->id == $id;
            } else return ($user->getRole() == "Admin");

        });
        /*  CVcontroller@  show + getPDF
        *   
        */
        $gate->define('view-cv', function ($user, $cv) {
            if ($user->getRole() == "Applicant") {
                return $user->id == $cv->user_id;
            } else
                return true;

        });

        /*
        *   use  in AppServiceProvider
        */
        $gate->define('get-cv', function ($user, $cv) {
            if ($user->getRole() == "Applicant" || $user->getRole() == "Admin") {
                return $user->id == $cv->user_id;
            } else if ($user->getRole() == "Visitor") {
                return false;
            }
        });
        

    }
}
