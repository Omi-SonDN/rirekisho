<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Vinkla\Hashids\Facades\Hashids;


class CV extends Model
{
    use SearchableTrait;

    protected $table = 'CV';
    protected $fillable = [
        'Furigana_name',
        'Last_name',
        'First_name',
        'Photo',
        'Birth_date',
        'Gender',
        'Address',
        'Contact_information',
        'Phone',
        'Self_intro',
        'Marriage',
        'Request',
        'positions',
        'notes',
        'github',
        'linkedin',
        'Active'
    ];

    protected $appends = ['age'];

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


    /************************** scope ********************************************/
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /****************************** Accessor ************************************/
    public function getNameAttribute()
    {
        if ($this->First_name != "") {
            return $this->Last_name . " " . $this->First_name;
        } else return null;
    }

    public function getJGenderAttribute()
    {
        if ($this->Gender == 0) {
            return "女性";
        } else return "男性";
    }

    public function getBDayAttribute()
    {
        $value = date_create($this->Birth_date);
        return date_format($value, 'Y年m月d日');
    }

    public function getBirthdayAttribute()
    {

        $value = date_create($this->Birth_date);
        return date_format($value, 'd-m-Y');
    }

    /**
     * @param $value
     * @return string
     */
    public function getAgeAttribute($value)
    {

        $value = date_create($this->Birth_date);
        $today = date_create();
        date_timestamp_set($today, time());
        $tuoi = date_diff($value, $today);
        return $tuoi->format("%y");
    }

    public function getJMarriageAttribute($value)
    {
        if ($this->Marriage == 0) {
            return "無";
        } else return "有";

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
    /*----------search rules ------------*/
    protected $searchable = [
        'columns' => [
            //'CV.id' => 5,
            'CV.first_name' => 10,
            'CV.last_name' => 10,
            'CV.Furigana_name' => 10,

        ],
        'joins' => [
            'users' => ['CV.user_id', 'users.id'],
        ],
    ];

    public function getHashAttribute()
    {
        return Hashids::encode($this->getKey());
    }
    public function getRouteKey()
    {
        return Hashids::encode($this->getKey());
    }
}
