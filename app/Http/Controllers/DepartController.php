<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests\DepartRequest;
use App\Model\Depart;
use DB;
use Illuminate\Http\Request;

class DepartController extends Controller {
	public function __construct(Depart $depart) {
		$this->depart = $depart;
		$this->middleware('adminrole');
	}

	public function index() {
		$list_depart = $this->depart->getListDepartments();

		return view('manage.departments.list', ['list' => $list_depart]);
	}

	public function create() {
		return view('manage.departments.add');
	}

	public function store(DepartRequest $request) {
		DB::table('departments')->insert($request->except('_token'));

		ALert::success('Thông báo ! Thêm mới thành công');

		return back();
	}

	public function edit($id) {
		$edit_depart = $this->depart->getEditDepartments($id)->first();

		return view('manage.departments.edit', compact('edit_depart'));
	}

	public function update(DepartRequest $request, $id) {
		$edit_depart = Depart::where('id', $id)->first();

		$edit_depart->depart_name = $request->depart_name;
		$edit_depart->depart_alias = str_slug($request->depart_name);
		$edit_depart->depart_phone = $request->depart_phone;
		$edit_depart->depart_note = $request->depart_note;
		$edit_depart->save();

		ALert::success('Thông báo ! Cập nhật thành công');
		return redirect('departments/edit/' . $id);
	}

	public function destroy($id) {
		if (isset($id)) {
			$delete_depart = Depart::where('id', $id)->first();
			$delete_depart->delete($id);
			return response()->json(['success' => 1]);
		} else {
			abort(404);
		}
	}
	
	public function deleteAll(Request $request) {
		$ids = $request->input('departdelete', []);
		DB::table('departments')->whereIn('id', $ids)->delete();
		Alert::success('Xóa thành công');
		return back();
	}
}
