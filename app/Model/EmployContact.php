<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployContact extends Model
{
    protected $table = 'employ_contact';

    public function employees()
    {
    	return $this->hasOne('App\Model\Employees');
    }
}
