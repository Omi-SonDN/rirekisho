<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Compnaies extends Model
{
    protected $table = 'companies';
    protected $fillable = [
        'namCompany',
        'map',
        'phones',
        'about',
        'link',
        'subdomain',
    ];
}
