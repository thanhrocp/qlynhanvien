<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use DB;

class Depart extends Model
{
    protected $table = 'departments';

    public function getListDepartments()
    {
    	return self::orderBy('id','desc')->get();
    }

    public function getEditDepartments($id)
    {
    	return DB::table('departments')->where('id',$id);
    }
}
