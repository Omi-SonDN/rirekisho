<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use App\CV;

class Record extends Model
{
    protected $fillable = [
        'Content', 'Date', 'Type',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function CV()
    {
        return $this->belongsTo('App\CV', 'cv_id');
    }

    //ở dưới là accessor
    public function getVNDateAttribute($value)
    {
        $value = date_create($this->Date);
        return date_format($value, 'd-m-Y');;
    }

    //function
    public function getRole()
    {
        if ($this->Type == 0) $Role = "School";
        elseif ($this->Type == 1) {
            $Role = "Work";
        } elseif ($this->Type == 2) {
            $Role = "Cert";
        }
        return $Role;
    }

    public function getHashAttribute()
    {
        return $this->getKey();
        //return Hashids::encode($this->getKey());
    }
}
