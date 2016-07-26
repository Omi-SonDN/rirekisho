<?php

namespace app;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\CV;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Nicolaslopezj\Searchable\SearchableTrait;
use Vinkla\Hashids\Facades\Hashids;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use SearchableTrait;
    protected $fillable = [
    'name', 'email', 'password', 'image',
    ];
    protected $hidden = [
    'password', 'remember_token','id'
    ];

    public function CV()
    {
        return $this->hasOne('App\CV');
    }
    public function Bookmark()
    {
        return $this->belongsToMany('App\User', 'bookmarks', 'user_id', 'bookmark_user_id')
            ->withPivot(['id', 'notes'])
            ->withTimestamps();
    }
    public function User()
    {
        return $this->belongsToMany('App\User', 'bookmarks', 'bookmark_user_id', 'user_id')
            ->withPivot(['id', 'notes'])
            ->withTimestamps();
    }

    public function getRole()
    {
        if ($this->role == 0)$Role = "Applicant";
        elseif ($this->role == 1) {
            $Role = "Visitor";
        }
        elseif ($this->role == 2) {
            $Role = "Admin";
        }
        return  $Role;
    }
    /*******scope*********/
    public function scopeVisitor($query)
    {
        //in test
        return $query->where('role', '=', 1);
    }
    public function scopeApplicant($query)
    {
        //in test
        return $query->where('role', '=', 0);
    }
    /*******rules ********/
    public static $rules = array(
        //Auth Controller
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed|min:4',
    );
    public static $login_rules = array(
        //Auth Controller
        'email' => 'required|email|max:255',
        'password' => 'required|min:4',
    );
   /*----------search rules ------------*/
    protected $searchable = [
        'columns' => [
            'users.id' => 5,
            'users.name' => 10,
            'users.email' => 10,
        ],

    ];
    public function getThemeColor()
    {
        if($this->getRole()== "Visitor") return "#f9f9f9";//gray
        if($this->getRole()== "Admin") return "#333333";
        $mod = $this->id% 19;
        $colours = [
            "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e",
            "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
            "#f1c40f", "#e67e22", "#e74c3c", "#95a5a6",
            "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
        ];
        return $colours[$mod];
    }
    public function getTextColor()
    {
        if($this->getRole()== "Applicant") return "white";
        $mod = $this->id% 19;
        $colours = [
            "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e",
            "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
            "#f1c40f", "#e67e22", "#e74c3c", "#95a5a6",
            "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
        ];
        return $colours[$mod];
    }
    public function getRouteKey()
    {
        return Hashids::encode($this->getKey());
    }
    public function getHashAttribute()
    {
        //return $this->getKey();
        return Hashids::encode($this->getKey());
    }

}
