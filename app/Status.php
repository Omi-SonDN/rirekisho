<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes; 
    protected $table = 'status';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'status',
        'prev_status',
        'infor',
        'allow_sendmail',
        'email_template',
        'role_VisitorStatus'
    ];
    public function CVs()
    {
        return $this->hasMany('App\CV', 'Status', 'id');
    }

    public function getAllowSendAttribute()
    {
        if ($this->allow_sendmail == 0) {
            return "<span class='label label-default'>Không cho phép</span>";
        } else return "<span class='label label-success'>Cho phép</span>";
    }
    public function getroleVisitorAttribute()
    {
        if ($this->role_VisitorStatus == 0) {
            return "<span class='label label-default'>Không cho phép</span>";
        } else return "<span class='label label-success'>Cho phép</span>";
    }
    public function getPreviousStatusAttribute(){

        return $this->prev_status ? explode(',', $this->prev_status) : array();
    }

    public function getInfoAttribute(){
        return $this->infor ? explode(',', $this->infor): array();
    }

    public function getStatusNameAttribute(){
        return $this->status;
    }

}
