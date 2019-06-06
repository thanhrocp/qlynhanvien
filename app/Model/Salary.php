<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model {
	protected $table = 'salary';

	public function getInfo() {
		return DB::table('employee')->join('departments', 'employee.depart_id', '=', 'departments.id')
			->join('users', 'employee.user_id', '=', 'users.id')
			->join('employ_contact', 'employee.id', '=', 'employ_contact.employ_id')
			->join('employ_work', 'employee.id', '=', 'employ_work.employ_id')
			->leftJoin('salary', 'employee.id', '=', 'salary.employ_id')
			->select('employee.first_name', 'employee.birth_date', 'employee.id', 'employee.last_name', 'employee.marital_status',
				DB::raw('CASE WHEN employee.gender=1 THEN "Nam" ELSE "Nữ" END as sex '),
				DB::raw('CASE WHEN users.role_id=1 THEN "Quản trị viên" WHEN users.role_id=2 THEN "Quản lý" ELSE "Nhân viên" END AS position'),
				DB::raw('CONCAT(employee.first_name," ",employee.last_name) AS full_name'),
				'departments.depart_name', 'employ_contact.ct_phone',
				'employ_work.work_code', 'employ_work.work_email',
				'salary.numberofday', 'salary.numberofot', 'salary.lateday', 'salary.salary', 'salary.allowance', 'salary.employ_id', 'salary.id as ids');
	}
}
