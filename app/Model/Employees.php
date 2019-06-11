<?php

namespace App\Model;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model {
	protected $table = 'employee';

	protected $fillable = [
		'depart_id', 'user_id', 'birth_date', 'first_name', 'last_name', 'gender', 'education',
		'identity_card', 'dateofissue', 'issued_by', 'religion', 'religion', 'marital_status'
	];

	public function users() {
		return $this->hasOne('App\User', 'user_id', 'id');
	}

	public function employ_contact() {
		return $this->hasOne('App\Model', 'employ_id', 'id');
	}

	public function getInfo() {
		$user = Auth::user()->employees->depart_id;

		return DB::table('employee')->join('departments', 'employee.depart_id', '=', 'departments.id')
			->join('users', 'employee.user_id', '=', 'users.id')
			->join('employ_contact', 'employee.id', '=', 'employ_contact.employ_id')
			->join('employ_work', 'employee.id', '=', 'employ_work.employ_id')
			->leftJoin('salary', 'employee.id', '=', 'salary.employ_id')
			->select('employee.first_name', 'employee.birth_date', 'employee.id', 'employee.last_name', 'employee.marital_status',
				DB::raw('CASE WHEN employee.gender=1 THEN "Nam" ELSE "Nữ" END as sex '),
				DB::raw('CASE WHEN users.role_id=1 THEN "Quản trị viên" WHEN users.role_id=2 THEN "Quản lý" ELSE "Nhân viên" END AS position'),
				DB::raw('CONCAT(employee.first_name," ",employee.last_name) AS full_name'),
				DB::raw('CONCAT(employ_contact.ct_town,", ",employ_contact.ct_village,", ",employ_contact.ct_address) as address'),
				'departments.depart_name', 'employ_contact.ct_phone', 'employ_contact.ct_city', 'employ_contact.ct_address',
				'employ_work.work_code', 'employ_work.work_email')
			->where('employee.depart_id', $user);
	}

	public function getInfoDetail() {
		$user = Auth::user()->employees->depart_id;
		return DB::table('employee')->join('departments', 'employee.depart_id', '=', 'departments.id')
			->join('users', 'employee.user_id', '=', 'users.id')
			->join('employ_contact', 'employee.id', '=', 'employ_contact.employ_id')
			->join('employ_work', 'employee.id', '=', 'employ_work.employ_id')
			->leftJoin('salary', 'employee.id', '=', 'salary.employ_id')
			->select('employee.first_name', 'employee.birth_date', 'employee.id', 'employee.last_name', 'employee.marital_status',
				DB::raw('CASE WHEN employee.gender=1 THEN "Nam" ELSE "Nữ" END as sex '),
				DB::raw('CASE WHEN users.role_id=1 THEN "Quản trị viên" WHEN users.role_id=2 THEN "Quản lý" ELSE "Nhân viên" END AS position'),
				DB::raw('CONCAT(employee.first_name," ",employee.last_name) AS full_name'),
				DB::raw('CONCAT(employ_contact.ct_town,", ",employ_contact.ct_village,", ",employ_contact.ct_address) as address'),
				'departments.depart_name', 'employ_contact.ct_phone', 'employ_contact.ct_city', 'employ_contact.ct_address',
				'employ_work.work_code', 'employ_work.work_email')
			->where('employee.depart_id', $user)
			->get();
	}
	public function getInfoPersonal() {
		$user = Auth::user()->id;
		return DB::table('employee')->join('users', 'employee.user_id', '=', 'users.id')
			->join('departments', 'employee.depart_id', '=', 'departments.id')
			->select(DB::raw('CASE WHEN users.role_id=1 THEN "Admin" WHEN users.role_id=2 THEN "Employee" ELSE "Member" END AS position '),
				'employee.*', 'departments.depart_name', 'users.email')
			->where('employee.user_id', $user);
	}
}
