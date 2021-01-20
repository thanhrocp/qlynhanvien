<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model {
	protected $table = 'salary';

	public function getInfo() {
		return DB::table('employee')->join('departments', 'employees.depart_id', '=', 'departments.id')
			->join('users', 'employees.user_id', '=', 'users.id')
			->join('employ_contact', 'employees.id', '=', 'employ_contact.employ_id')
			->join('employ_work', 'employees.id', '=', 'employ_work.employ_id')
			->leftJoin('salary', 'employees.id', '=', 'salary.employ_id')
			->select('employees.first_name', 'employees.birth_date', 'employees.id', 'employees.last_name', 'employees.marital_status',
				DB::raw('CASE WHEN employees.gender=1 THEN "Nam" ELSE "Nữ" END as sex '),
				DB::raw('CASE WHEN users.role_id=1 THEN "Quản trị viên" WHEN users.role_id=2 THEN "Quản lý" ELSE "Nhân viên" END AS position'),
				DB::raw('CONCAT(employees.first_name," ",employees.last_name) AS full_name'),
				'departments.depart_name', 'employ_contact.ct_phone',
				'employ_work.work_code', 'employ_work.work_email',
				'salary.numberofday', 'salary.numberofot', 'salary.lateday', 'salary.salary', 'salary.allowance', 'salary.employ_id', 'salary.id as ids');
	}
}
