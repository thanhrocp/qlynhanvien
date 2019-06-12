<?php

namespace App\Http\Controllers;

use Alert;
use App\Model\EmployWork;
use DB;
use Illuminate\Http\Request;

class EmployeeWorkController extends Controller 
{
	/*--------------get info----------------*/
	public function getInfo($id) 
	{
		return EmployWork::where('employ_id', $id)->first();
	}
	/*--------------show form----------------*/
	public function index($id) 
	{
		# code...
		$info = $this->getInfo($id);

		return view('manage.employees.add_work', ['info' => $info]);
	}
	/*--------------update info work----------------*/
	public function update(Request $request, $id) 
	{
		$checkExists = DB::table('employ_work')->where('employ_id', $id)->count();

		if ($checkExists == 0) {
			$employ_id = $id;
			$code = "NV0000" . rand(1000, 9999);
			$request->merge(['work_code' => $code, 'employ_id' => $employ_id]);
			EmployWork::insert($request->except('_token'));
			Alert::success('Thông báo ! Thêm mới thành công');
			return redirect('employees/edit/' . $id . '/work');
		} else {
			$update = DB::table('employ_work')->where('employ_id', $id);
			$update->update($request->except('_token'));
			Alert::success('Thông báo ! Cập nhật thành công');
			return redirect('employees/edit/' . $id . '/work');
		}
	}
}
