<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployContact extends Model {
	protected $table = 'employ_contact';

	public function employees() {
		return $this->hasOne('App\Model\Employees');
	}
	public function InfoContact() {
		return DB::table('employee')->join('users', 'employee.user_id', '=', 'users.id')
			->join('departments', 'employee.depart_id', '=', 'departments.id')
			->join('employ_contact', 'employee.id', '=', 'employ_contact.employ_id')
			->join('employ_work', 'employee.id', '=', 'employ_work.employ_id')
			->select(DB::raw('CONCAT(employee.first_name," ",employee.last_name) AS full_name'),
				'employee.*', 'departments.*', 'employ_contact.*', 'users.*', 'employ_work.*',
				DB::raw('CASE WHEN users.role_id=1 THEN "Manage" WHEN users.role_id=2 THEN "Employee" ELSE "Admin" END AS position'));
	}
}
