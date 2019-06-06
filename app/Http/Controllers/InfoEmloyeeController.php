<?php

namespace App\Http\Controllers;

use App\Model\Employees;

class InfoEmloyeeController extends Controller {
	//
	public function __construct(Employees $employ) {
		$this->employ = $employ;
	}
	//get info
	public function index() {
		# code...
		$info['info'] = $this->employ->getInfo()->get();

		return view('manage.infoemploy.list', $info);
	}
	// Xuất file excel
	public function exportExcel() {

	}
}
