<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DepartRequest;
use App\Model\Department;
use App\Http\Repository\DepartmentRepository;

class DepartController extends Controller {
	public function __construct(Department $depart) 
	{
		$this->depart = $depart;
	}

	public function index() 
	{
		$departmentRepository = new DepartmentRepository();
		$result = $departmentRepository->getListDepartment();

		return view('manage.departments.list', ['list' => $result]);
	}

	public function create() 
	{
		return view('manage.departments.create');
	}

	public function store(DepartRequest $request) 
	{
		DB::table('departments')->insert($request->except('_token'));

		ALert::success('Thông báo ! Thêm mới thành công');

		return back();
	}

	public function edit($id) 
	{
		$departmentRepository = new DepartmentRepository();
		$result = $departmentRepository->getDetailDepartment($id);

		return view('manage.departments.edit', ['result' => $result]);
	}

	public function update(DepartRequest $request, $id) 
	{
		$edit_depart = Depart::where('id', $id)->first();

		$edit_depart->depart_name = $request->depart_name;
		$edit_depart->depart_alias = str_slug($request->depart_name);
		$edit_depart->depart_phone = $request->depart_phone;
		$edit_depart->depart_note = $request->depart_note;
		$edit_depart->save();

		ALert::success('Thông báo ! Cập nhật thành công');
		return redirect('departments/edit/' . $id);
	}

	public function destroy($id) 
	{
		if (isset($id)) {
			$delete_depart = Depart::where('id', $id)->first();
			$delete_depart->delete($id);
			return response()->json(['success' => 1]);
		} else {
			abort(404);
		}
	}
	
	public function deleteAll(Request $request) 
	{
		$ids = $request->input('departdelete', []);
		DB::table('departments')->whereIn('id', $ids)->delete();
		Alert::success('Xóa thành công');
		return back();
	}
}
