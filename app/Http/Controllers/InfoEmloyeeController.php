<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class InfoEmloyeeController extends Controller
{
	//
	public function __construct(Employee $employ)
	{
		$this->employ = $employ;
	}
	//get info
	public function index()
	{
		# code...
		$info['info'] = $this->employ->getInfo()->get();

		return view('admin.infoemploy.list', $info);
	}
	// Xuất file excel
	public function exportExcel()
	{

	}
}
