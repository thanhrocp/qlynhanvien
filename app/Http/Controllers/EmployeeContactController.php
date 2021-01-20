<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests\EmployContactRequest;
use App\Models\EmployContact;
use Illuminate\Support\Facades\DB;

class EmployeeContactController extends Controller
{
	/*-------------get Info contact-------------*/
	public function getInfo($id)
	{
		return EmployContact::where('employ_id', $id)->first();
	}
	/*-------------show form update contact-------------*/
	public function index($id) {
		$info = $this->getInfo($id);
		return view('admin.employees.add_contact', ['info' => $info]);
	}
	/*-------------Update employee contact-------------*/
	public function update(EmployContactRequest $request, $id)
	{
		$checkExists = DB::table('employ_contact')->where('employ_id', $id)->count();

		if ($checkExists == 0) {
			$add = new EmployContact;
			$employ_id = $id;
			$add->employ_id = $employ_id;
			$add->ct_phone = $request->ct_phone;
			$add->ct_email = $request->ct_email;
			$add->save();
			Alert::success('Thông báo ! Thêm mới thành công');
			return redirect('employees/edit/' . $id . '/contact');
		} else {
			$update = DB::table('employ_contact')->where('employ_id', $id);
			$update->update($request->except('_token'));
			Alert::success('Thông báo ! Cập nhật thành công');
			return redirect('employees/edit/' . $id . '/contact');
		}
	}
}
