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
        'Active',
    ];

    protected $appends = ['age'];

    // public function getStatusnameAttribute(){
    //     switch ($this->Status) {
    //         case 0: return "Chờ duyệt"; break;
            
    //         default:
    //             # code...
    //             break;
    //     }
    // }

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
    public function position()
    {
        return $this->belongsTo('App\Positions', 'positions', 'id');
    }

    /************************** scope ********************************************/
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSortByNameAsc($query, $name, $Status, $positions)
    {
        // if($name != "")
        //     $CVs = CV::with('User')->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->get();
        // else
        //     $CVs = CV::with('User')->get();
        if($Status == 'Status' && $positions == 'Vị trí tuyển dụng' && $name == '' ){
            $CVs = CV::with('User')->get();
        }
        else{
            if($Status != 'Status'){
                if($name != ''){
                    if($positions != 'Vị trí tuyển dụng')
                        $CVs = CV::with('User')->where('positions', $positions)->where('status', $Status)->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->get();
                    else $CVs= CV::with('User')->where('status', $Status)->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->get();
                } else {
                    if($positions != 'Vị trí tuyển dụng')
                        $CVs = CV::with('User')->where('positions', $positions)->where('status', $Status)->get();
                    else $CVs = CV::with('User')->where('status', $Status)->get();
                }
            } else {
                if($name != ''){
                    $CVs = CV::with('User')->where('positions', $positions)->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->get();
                } else {
                    $CVs = CV::with('User')->where('positions', $positions)->get();
                }
            }
        }

        for ($i = 0; $i < $CVs->count(); $i++) {
            $name = $CVs[$i]->Last_name . " " . $CVs[$i]->First_name;
            $len = strlen($name);
            $start = stripos($name, " ");
            $end = strripos($name, " ");
            $ten = substr($name, $end + 1);
            $dem = substr($CVs[$i]->First_name, 0, $end - $len);
            $CVs[$i]->ten = $ten;
            $CVs[$i]->dem = $dem;

        }
        for ($i = 0; $i < $CVs->count() - 1; $i++) {
            for ($j = $i + 1; $j < $CVs->count(); $j++) {
                if (strnatcasecmp($CVs[$i]->ten, $CVs[$j]->ten) == 0) {
                    if (strnatcasecmp($CVs[$i]->Last_name, $CVs[$j]->Last_name) == 0) {
                        if (strnatcasecmp($CVs[$i]->dem, $CVs[$j]->dem) == 1) {
                            $tm = $CVs[$i];
                            $CVs[$i] = $CVs[$j];
                            $CVs[$j] = $tm;
                        }
                    } else {
                        if (strnatcasecmp($CVs[$i]->Last_name, $CVs[$j]->Last_name) == 1) {
                            $tm = $CVs[$i];
                            $CVs[$i] = $CVs[$j];
                            $CVs[$j] = $tm;
                        }
                    }
                } else {
                    if (strnatcasecmp($CVs[$i]->ten, $CVs[$j]->ten) == 1) {
                        $tm = $CVs[$i];
                        $CVs[$i] = $CVs[$j];
                        $CVs[$j] = $tm;
                    }
                }
            }
        }
        return $CVs;
    }

    public function scopeSortByNameDesc($query, $name, $Status, $positions)
    {
        
        if($Status == 'Status' && $positions == 'Vị trí tuyển dụng' && $name == '' ){
            $CVs = CV::with('User')->get();
        } else{
            if($Status != 'Status'){
                if($name != ''){
                    if($positions != 'Vị trí tuyển dụng')
                        $CVs = CV::with('User')->where('positions', $positions)->where('status', $Status)->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->get();
                    else $CVs= CV::with('User')->where('status', $Status)->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->get();
                } else {
                    if($positions != 'Vị trí tuyển dụng')
                        $CVs = CV::with('User')->where('positions', $positions)->where('status', $Status)->get();
                    else $CVs = CV::with('User')->where('status', $Status)->get();
                }
            } else {
                if($name != ''){
                    $CVs = CV::with('User')->where('positions', $positions)->orwhere('First_name', 'like', "%{$name}%")->orwhere('Last_name', 'like', "%{$name}%")->get();
                } else {
                    $CVs = CV::with('User')->where('positions', $positions)->get();
                }
            }
        }

        for ($i = 0; $i < $CVs->count(); $i++) {
            $name = $CVs[$i]->Last_name . " " . $CVs[$i]->First_name;
            $len = strlen($name);
            $start = stripos($name, " ");
            $end = strripos($name, " ");
            $ten = substr($name, $end + 1);
            $dem = substr($CVs[$i]->First_name, 0, $end - $len);
            $CVs[$i]->ten = $ten;
            $CVs[$i]->dem = $dem;

        }
        for ($i = 0; $i < $CVs->count() - 1; $i++) {
            for ($j = $i + 1; $j < $CVs->count(); $j++) {
                if (strnatcasecmp($CVs[$i]->ten, $CVs[$j]->ten) == 0) {
                    if (strnatcasecmp($CVs[$i]->Last_name, $CVs[$j]->Last_name) == 0) {
                        if (strnatcasecmp($CVs[$i]->dem, $CVs[$j]->dem) == -1) {
                            $tm = $CVs[$i];
                            $CVs[$i] = $CVs[$j];
                            $CVs[$j] = $tm;
                        }
                    } else {
                        if (strnatcasecmp($CVs[$i]->Last_name, $CVs[$j]->Last_name) == -1) {
                            $tm = $CVs[$i];
                            $CVs[$i] = $CVs[$j];
                            $CVs[$j] = $tm;
                        }
                    }
                } else {
                    if (strnatcasecmp($CVs[$i]->ten, $CVs[$j]->ten) == -1) {
                        $tm = $CVs[$i];
                        $CVs[$i] = $CVs[$j];
                        $CVs[$j] = $tm;
                    }
                }
            }
        }
        return $CVs;
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
            return "Nữ";
        } else {
            return "Nam";
        }
    }

    public function getPositionAttribute()
    {
        $position = $this->positions;
        return $position;

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
