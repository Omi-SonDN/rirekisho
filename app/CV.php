<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Vinkla\Hashids\Facades\Hashids;
use DB;

class CV extends Model
{
    use SearchableTrait;

    protected $table = 'cvs';
    protected $fillable = [
        'user_id',
        'name_cv',
        'email',
        'Photo',
        'Request',
        'positions',
        'Memo',
        'Active',
        'Status',
        'version',
        'apply_to',
        'notes',
        'type_cv',
        'live',
        'attach',
        'github',
        'linkedin',
        'group',
        'active_by'
    ];

    public function User()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function Record()
    {
        return $this->hasMany('App\Record', 'cv_id');
    }

    public function Skill()
    {
        return $this->hasMany('App\Skill', 'cv_id');
    }

    public function positionCv()
    {
        return $this->belongsTo('App\Positions', 'apply_to', 'id');
    }
    public function theGroup(){
        return $this->hasOne('App\Group','id','group');
        //return App\Group::find($this->group);
    }
    public function status()
    {
        return $this->belongsTo('App\Status', 'Status', 'id');
    }

//    /************* scope *********************/
//    public function scopeActive($query)
//    {
//        return $query->where('active', 1);
//    }

    /************* scopenoneactive array *********************/
    public function scopeIsactive($query, $active)
    {
        if ($active) {
            return $query->whereIn('cvs.active', $active);
        } else {
            return $query;
        }
    }

    /************* scopeislive array *********************/
    public function scopeIslive($query, $live)
    {
        return $query->whereIn('cvs.live', $live);
    }
    /************* scopeisType CV array *********************/
    public function scopeIsTypecv($query, $typecv)
    {
        return $query->whereIn('cvs.type_cv', $typecv);
    }

    /************* scope check status cv *********************/
    public function getCheckcvAttribute()
    {
        if ($this->Active == 0) {
            return "Hồ sơ đang chờ duyệt";
        } else {
            return "Hồ sơ đã duyệt";
        }
    }
    /************* scope check status cv *********************/
    public function getLivecvAttribute()
    {
        if ($this->live == 0) {
            return '<img style="-webkit-user-select: none" alt="Cv Offline" src="'. asset('/admin/img/users_offline.gif').'">';
        } else {
            return '<img style="-webkit-user-select: none" alt="Cv Online" src="'. asset('/admin/img/users_online.gif').'">';
        }
    }
    /************* scope check type cv *********************/
    public function getcvTypeAttribute()
    {
        if ($this->type_cv == 0) {
            return 'Hồ sơ từng bước';
        } else {
            return 'Hồ sơ đính kèm file';
        }
    }
    /************* scope check type cv *********************/
    public function getActBycvAttribute()
    {
        $_us = \DB::table('users')->where('id',$this->active_by)->first();
        if(count($_us) && $_us->First_name) {
            return '<a href="#" title="Viet them trang thong tin tai khoan CV info">' . $_us->Last_name . " " . $_us->First_name .'</a>';
        } else {
            return '----';
        }
    }

    public function getStatusCVAttribute()
    {
        $status = $this->Status;
        $status = DB::table('status')->where('id', '=', $status)->get();
        return $status[0]->status;
    }

    public function getPositionAttribute()
    {
        $position = $this->positions;
        return $position;

    }

    /*******rules ********/
    public static $update_rules = array(
        'Furigana_name' => 'max:255',
        'Last_name' => 'max:255',
        'First_name' => 'max:255',
        'Photo' => '',
        'Birth_date' => '',
        'Gender' => '',
        'Address' => '',
        'Contact_information' => '',
        'Phone' => '',
        'Self_intro' => '',
        'Marriage' => '',
        'Request' => '',
        'Career' => '',
    );

    public function getHashAttribute()
    {
        return Hashids::encode($this->getKey());
    }

    public function getRouteKey()
    {
        return Hashids::encode($this->getKey());
    }

}
