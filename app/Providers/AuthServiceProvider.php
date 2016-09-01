<?php

namespace app\Providers;

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
        /*SuperAdmin*/
        $gate->define('SuperAdmin', function ($user) {
            return $user->getRole() == "SuperAdmin";
        });
        $gate->define('Admin', function ($user) {
            return $user->getRole() == "Admin" || ($user->getRole() == "SuperAdmin");
        });
        /*  Visitor's 
        */
        $gate->define('Visitor', function ($user) {
            return ($user->getRole() == "Visitor") || ($user->getRole() == "Admin") || ($user->getRole() == "SuperAdmin");
        });
        /*  Applicant's  
        */
        $gate->define('Applicant', function ($user) {
            return $user->getRole() == "Applicant" || ($user->getRole() == "Admin") || ($user->getRole() == "SuperAdmin");
        });
        /*
        *   from here are policies with parameter
        */
        // @param $id
        $gate->define('update-cv', function ($user, $id) {

            if ($user->getRole() === 'SuperAdmin')
                return true;

            if ($user->getRole() == "Applicant") {
                return $user->id == $id;
            } else
                return ($user->getRole() == "Admin");

        });
        /* profile 
        */
        $gate->define('profile', function ($user, $id) {
            if ($user->getRole() === 'SuperAdmin')
                return true;

            if ($user->getRole() == "Applicant" || $user->getRole() == "Visitor") {
                return $user->id == $id;
            } else return ($user->getRole() == "Admin");

        });
        /*  CVcontroller@  show + getPDF
        *   
        */
        $gate->define('view-cv', function ($user, $cv) {
            if ($user->getRole() === 'SuperAdmin')
                return true;
            if ($user->getRole() == "Applicant") {
                if (count($cv)) {
                    return $user->id == $cv->user_id;
                } else {
                    return false;
                }
            } else
                return true;

        });

        /*
        *   use  in AppServiceProvider
        */
        $gate->define('get-cv', function ($user, $cv) {
            if ($user->getRole() === 'SuperAdmin')
                return true;

            if ($user->getRole() == "Applicant" || $user->getRole() == "Admin") {
                if (count($cv)) {
                    foreach ($cv as $_cv) {
                        return $user->id == $_cv->user_id;
                    }
                } else {
                    return true;
                }
            } else if ($user->getRole() == "Visitor") {
                return false;
            }
        });
        /*
        *   kiem tra xoa CV
        *   Visitor ko dk xoa cv bat ky
        *   Applicant chi duoc xoa CV ban than
        */
        $gate->define('del-cv', function ($user, $cv) {

            if ($user->getRole() == "Applicant") {
                if (count($cv)) {
                    return $user->id == $cv->user_id;
                } else {
                    return false;
                }
            } else if ($user->getRole() == "Visitor") {
                return false;
            } else {
                return true;
            }
        });

        /*
         * Kiem show CV TUNG BUOC
         * UngVien: chi co quyen xem tai khoan
         * Visitor: chi xem cv truc tuyen va duoc kich hoat
         * Admin:  xem cv full cua admin va truc tuyen
         */
        $gate->define('show-cv-step', function ($user, $cv) {
            if ($user->getRole() == "Applicant") {
                if (count($cv)) {
                    return $user->id == $cv->user_id && $cv->type_cv == 0;
                } else {
                    return false;
                }
            } elseif ($user->getRole() == "Visitor") {
                if (count($cv)) {
                    return $cv->live == 1 && $cv->Active == 1 && $cv->type_cv == 0;
                } else {
                    return false;
                }
            } elseif ($user->getRole() === 'Admin') {
                if (count($cv)) {
                    return $user->id == $cv->user_id || ($cv->live == 1 && $cv->type_cv == 0);
                } else {
                    return false;
                }
            } else {
                return true;
            }
        });
        /*
        * Kiem show CV UPLOAD FILE
        * UngVien: chi co quyen
        * Visitor:
        * Admin:
        */
        $gate->define('show-cv-upload', function ($user, $cv) {
            if ($user->getRole() == "Applicant") {
                if (count($cv)) {
                    return $user->id == $cv->user_id && $cv->type_cv == 1;
                } else {
                    return false;
                }
            } elseif ($user->getRole() == "Visitor") {
                if (count($cv)) {
                    return $cv->live == 1 && $cv->Active == 1 && $cv->type_cv == 1;
                } else {
                    return false;
                }
            } elseif ($user->getRole() === 'Admin') {
                if (count($cv)) {
                    return $user->id == $cv->user_id || ($cv->live == 1 && $cv->type_cv == 1);
                } else {
                    return false;
                }
            } else {
                return true;
            }
        });

        /*
         * Kiem tra edit voi CV TUNG BUOC
         * UngVien: chi sua vc ban than
         * Visitor: khong duoc sua cv nao
         * Admin:  true
         */
        $gate->define('edit-cv-step', function ($user, $cv) {
            if ($user->getRole() == "Applicant") {
                if (count($cv)) {
                    return $user->id == $cv->user_id && $cv->type_cv == 0;
                } else {
                    return false;
                }
            } elseif ($user->getRole() == "Visitor") {
                return false;
            } elseif ($user->getRole() === 'Admin') {
                if (count($cv)) {
                    return $user->id == $cv->user_id || ($cv->live == 1 && $cv->type_cv == 0);
                } else {
                    return false;
                }
            } else {
                return true;
            }
        });
        /*
     * Kiem tra edit voi CV UPLOAD FILE
     * UngVien: chi sua vc ban than
     * Visitor: khong duoc sua cv nao
     * Admin:  true
     */
        $gate->define('edit-cv-upload', function ($user, $cv) {
            if ($user->getRole() == "Applicant") {
                if (count($cv)) {
                    return $user->id == $cv->user_id && $cv->type_cv == 1;
                } else {
                    return false;
                }
            } elseif ($user->getRole() == "Visitor") {
                return false;
            } elseif ($user->getRole() === 'Admin') {
                if (count($cv)) {
                    return $user->id == $cv->user_id || ($cv->live == 1 && $cv->type_cv == 1);
                } else {
                    return false;
                }
            } else {
                return true;
            }
        });


        // Applicant khong cho phep xem cac profile khac
        $gate->define('getAbout', function ($user, $id) {
            if ($user->getRole() === 'SuperAdmin')
                return true;

            if ($user->getRole() == "Applicant") {
                return $user->id == $id;
            } else return ($user->getRole() == "Admin");

        });
    }
}
