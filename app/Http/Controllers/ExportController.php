<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportController extends Controller implements FromCollection, WithHeadings
{
	//
	public function __construct(Employees $employ)
	{
		$this->employ = $employ;
	}
	/*---------------lấy thông tin-----------*/
	public function collection() {
		$info = $this->employ->getInfo();
		foreach ($info as $no => $row) {
			$employee[] = array(
				'0' => ++$no,
				'1' => $row->work_code,
				'2' => $row->full_name,
				'3' => $row->department_name,
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
	/*---------------Tạo header-----------*/
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
