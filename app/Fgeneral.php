<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fgeneral extends Model
{
    
    public $table = 'f_general';
    protected $fillable = [
        'key',
        'value',
        'created_at',
        'updated_at',
    ];
}
