<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmployContact extends Model
{
	protected $table = 'employ_contact';

	public function employees() {
		return $this->hasOne('App\Models\Employee');
	}
	public function InfoContact() {
		return DB::table('employee')->join('users', 'employees.user_id', '=', 'users.id')
			->join('departments', 'employees.depart_id', '=', 'departments.id')
			->join('employ_contact', 'employees.id', '=', 'employ_contact.employ_id')
			->join('employ_work', 'employees.id', '=', 'employ_work.employ_id')
			->select(DB::raw('CONCAT(employees.first_name," ",employees.last_name) AS full_name'),
				'employees.*', 'departments.*', 'employ_contact.*', 'users.*', 'employ_work.*',
				DB::raw('CASE WHEN users.role_id=1 THEN "Manage" WHEN users.role_id=2 THEN "Employee" ELSE "Admin" END AS position'));
	}
}
