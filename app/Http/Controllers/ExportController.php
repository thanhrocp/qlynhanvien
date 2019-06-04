<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ExportController extends Controller implements FromCollection, WithHeadings
{
    //
    public function getInfo()
    {
        $user = \Auth::user()->employees->depart_id;
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
                                    ->where('employee.depart_id',$user)
                                    ->get();
    }
    /*---------------lấy thông tin-----------*/
    public function collection()
    {
    	$info = $this->getInfo();
        foreach ($info as $no => $row)
        {
            $employee[] = array(
            	'0' => ++$no,
                '1' => $row->work_code,
                '2' => $row->full_name,
                '3' => $row->depart_name,
                '4' => $row->position,
                '5' => $row->birth_date,
                '6' => $row->work_email,
                '7' => $row->sex,
                '8' => $row->ct_phone,
                '9' => $row->ct_city,
                '10' => $row->address,
            );
        }
        return (collect($employee));
    }
    /*---------------Tạo thông tin-----------*/
    public function headings(): array
    {
        return [
        	'STT',
            'Mã nhân viên',
            'Họ tên',
            'Bộ phận',
            'Vị trí',
            'Ngày sinh',
            'Email',
            'Giới tính',
            'Số điện thoại',
            'Quê quán',
            'Địa chỉ',
        ];
    }
    /*-------------Xuất file excoelo`----------*/
    public function export()
    {
     	return Excel::download(new ExportController(), 'dsnhanvien.Xlsx');
	}
}
