<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Auth;

class InfoEmloyeeController extends Controller
{
    //
    public function getInfo()
    {
        $user = Auth::user()->employees->depart_id;

        return DB::table('employee')->join('departments','employee.depart_id','=','departments.id')
                                    ->join('users','employee.user_id','=','users.id')
                                    ->join('employ_contact','employee.id','=','employ_contact.employ_id')
                                    ->join('employ_work','employee.id','=','employ_work.employ_id')
                                    ->leftJoin('salary','employee.id','=','salary.employ_id')
                                    ->select('employee.first_name','employee.birth_date','employee.id','employee.last_name','employee.marital_status',
                                            DB::raw('CASE WHEN employee.gender=1 THEN "Nam" ELSE "Nữ" END as sex '),
                                            DB::raw('CASE WHEN users.role_id=1 THEN "Quản trị viên" WHEN users.role_id=2 THEN "Quản lý" ELSE "Nhân viên" END AS position'),
                                            DB::raw('CONCAT(employee.first_name," ",employee.last_name) AS full_name'),
                                            DB::raw('CONCAT(employ_contact.ct_town,", ",employ_contact.ct_village,", ",employ_contact.ct_address) as address'),
                                            'departments.depart_name','employ_contact.ct_phone','employ_contact.ct_city','employ_contact.ct_address',
                                            'employ_work.work_code','employ_work.work_email')
                                    ->where('employee.depart_id',$user);
    }
    //get info
    public function index()
    {
    	# code...
    	$info['info'] = $this->getInfo()->get();

    	return view('manage.infoemploy.list',$info);
    }
    // Xuất file excel
    public function exportExcel()
    {

    }
}
