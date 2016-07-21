<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function Users()
    {
        return $this->belongsToMany(
            'App\User', 'pivot_users_groups', 'group_id', 'user_id');
    }
    
    //Delete all relation before datele
    public static function boot()
    {
        parent::boot();

        static::deleted(function($group) {
            $group->users()->detach();
        });
    }
}
