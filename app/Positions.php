<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    public $table = 'positions';
    protected $fillable = [
        'name',
        'active',
        'description'
    ];

    public function CVs()
    {
        return $this->hasMany('App\CV', 'apply_to');
    }
    public function getActPositionAttribute()
    {
        if ($this->active == 0) {
            return "Chưa kích hoạt";
        } else return "Đã kích hoạt";
    }
    //change cv.apply_to before delete position
    public static function boot()
    {
        parent::boot();

        static::deleted(function ($position) {
            foreach ($position->CVs as $cv) {
                $cv->apply_to = 0;
                $cv->update();
            }
        });
    }
}
