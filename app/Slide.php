<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slide extends Model
{
    use SoftDeletes;
    
    public $table = 'f_slide';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'image',
        'text',
        'order',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
