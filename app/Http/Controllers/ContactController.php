<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class ContactController extends Controller
{
	/*---------------get Info---------------*/
	public function InfoContact()
	{
		return DB::table('employee')->join('users','employee.user_id','=','users.id')
									->join('departments','employee.depart_id','=','departments.id')
									->join('employ_contact','employee.id','=','employ_contact.employ_id')
									->join('employ_work','employee.id','=','employ_work.employ_id')
									->select(DB::raw('CONCAT(employee.first_name," ",employee.last_name) AS full_name'),
										'employee.*','departments.*','employ_contact.*','users.*','employ_work.*',
										DB::raw('CASE WHEN users.role_id=1 THEN "Manage" WHEN users.role_id=2 THEN "Employee" ELSE "Admin" END AS position'));
	}
	/*-----------------show---------------*/
    public function index()
    {
    	$info['info'] = $this->InfoContact()->paginate(5);

    	return view('manage.contacts.list',$info);
    }
}
