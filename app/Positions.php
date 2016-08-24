<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Positions extends Model
{
    use SoftDeletes;
    
    public $table = 'positions';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'active',
        'icon',
        'description'
    ];

    public function CVs()
    {
        return $this->hasMany('App\CV', 'apply_to', 'id');
    }
    public function getActPositionAttribute()
    {
        if ($this->active == 0) {
            return "<span class='label label-default'>Chưa kích hoạt</span>";
        } else return "<span class='label label-success'>Đã kích hoạt</span>";
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
    public function scopeActives($query)
    {
        return $query->where('active', 1);
    }

    public function getNamePositionAttribute()
    {
        return strtolower($this->name);
    }

}
