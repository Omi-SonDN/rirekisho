<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $table = 'group';
    protected $fillable = [
        'name',
        'parent',
    ];

    public function theParent(){
    	//return $this->hasOne('App\Group','id','parent');
    	$target = $this->find($this->parent);
    	return $target;
    }
}
