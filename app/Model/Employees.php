<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employee';

    public function users()
    {
    	return $this->hasOne('App\User','user_id','id');
    }

    public function employ_contact()
    {
    	return $this->hasOne('App\Model','employ_id','id');
    }
}
