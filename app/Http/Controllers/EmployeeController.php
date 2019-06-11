<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests\EmployeeRequest;
use App\Model\Employees;
use DB;
use File;
use Illuminate\Http\Request;
use Image;
use Exception;

class EmployeeController extends Controller {
	public function __construct() {
		$this->middleware('adminrole');
	}
	/*-------------get Info-------------*/
	public function getInfo() {
		return Employees::join('departments', 'employee.depart_id', '=', 'departments.id')
		->select(DB::raw('CONCAT(employee.first_name," ",employee.last_name) as full_name'),
			DB::raw('CASE WHEN employee.gender=1 THEN "Nam" ELSE "Nữ" END as sex'),
			'employee.*', 'departments.depart_name');
	}
	/*-------------show list-------------*/
	public function index() {
		# code...
		$list = $this->getInfo()->get();

		return view('manage.employees.list', ['list' => $list]);
	}
	/*-------------show form add----------*/
	public function create() {
		return view('manage.employees.add');
	}
	/*-------------Create employees-------*/
	public function store(EmployeeRequest $request) {
		DB::beginTransaction();
		try {
			$add = new Employees;
			$add->depart_id = $request->depart_id;
			$add->user_id = $request->user_id;
			$add->birth_date = $request->birth_date;
			$add->first_name = $request->first_name;
			$add->last_name = $request->last_name;
			$add->gender = $request->gender;
			$add->identity_card = $request->identity_card;
			$add->dateofissue = $request->dateofissue;
			$add->issued_by = $request->issued_by;
			$add->religion = $request->religion;
			$add->nation = $request->nation;
			$add->marital_status = $request->marital_status;

			if ($request->hasFile('avatar')) {
				if ($request->file('avatar')->isValid()) {
					$file_upload = $request->file('avatar');

					$extension = $file_upload->getClientOriginalExtension();

					$file_name = time() . "_" . str_random(5) . "_" . rand(1111, 9990) . "." . $extension;

					$save_file = 'upload/avatar/' . $file_name;

					Image::make($file_upload)->resize(300, 300)->save($save_file);

					$add->avatar = $file_name;
				}
			} else {
				$add->avatar = "";
			}
			DB::commit();

			$add->save();

			Alert::success('Thông báo ! Thêm mới thành công');
			return back();
		} catch (Exception $e) {
			DB::rollBack();
			throw new Exception($e->getMessage());
			Alert()->success('Lỗi không thêm được');
			return back();
		}
	}
	/*-------------show form edit employees-------*/
	public function edit($id) {
		if (isset($id)) {
			$update = Employees::findOrFail($id);

			return view('manage.employees.edit', ['update' => $update]);
		}
		abort(404);
	}
	/*-------------update employee-------------*/
	public function update(Request $request, $id) {
		$edit = Employees::find($id);
		$edit->depart_id = $request->depart_id;
		$edit->birth_date = $request->birth_date;
		$edit->first_name = $request->first_name;
		$edit->last_name = $request->last_name;
		$edit->gender = $request->gender;
		$edit->identity_card = $request->identity_card;
		$edit->dateofissue = $request->dateofissue;
		$edit->issued_by = $request->issued_by;
		$edit->religion = $request->religion;
		$edit->nation = $request->nation;
		$edit->marital_status = $request->marital_status;
		//upload image
		if ($request->hasFile('avatar')) {
			if ($request->file('avatar')->isValid()) {
				$file_upload = $request->file('avatar');
				$extension = $file_upload->getClientOriginalExtension();
				$file_name = time() . "_" . str_random(5) . "_" . rand(1111, 9990) . "." . $extension;
				$save_file = 'upload/avatar/' . $file_name;
				Image::make($file_upload)->resize(300, 300)->save($save_file);
				File::delete("upload/avatar/" . $edit->avatar);
				$edit->avatar = $file_name;
			}
		}
		$edit->save();

		Alert::success('Thông báo ! Cập nhật thành công');
		return back();
	}

	public function destroy($id) {
		if (isset($id)) {
			$delete = Employees::find($id);
			File::delete("upload/avatar/" . $delete->avatar);
			$delete->delete($id);
			return response()->json(['success' => 1]);
		} else {
			abort(404);
		}
	}
}
