<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DepartRequest;
use App\Model\Department;
use App\Http\Repositories\DepartmentRepository;

class DepartController extends Controller
{
    /**
     * Manage the list of departments
     *
     * @return \Illuminate\View\View
     */
	public function getList()
	{
		$departmentRepository = new DepartmentRepository();
		$result = $departmentRepository->getListDepartment();
		return view('manage.departments.list', ['result' => $result]);
	}

    /**
     * Manage additional departments
     *
     * @return \Illuminate\View\View
     */
	public function getNew()
	{
		return view('manage.departments.new');
	}

    /**
     * Handling new department
     *
     * @param \App\Http\Requests\DepartRequest $request
     * @return \Illuminate\Routing\Redirector
     */
	public function postNew(DepartRequest $request)
	{
        $formInput = $request->all();
        $departmentRepository = new DepartmentRepository();
        $departmentRepository->intert($formInput);

		return back();
	}

    /**
     * Page display edit processing
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
	public function getEdit(string $id)
	{
		$departmentRepository = new DepartmentRepository();
		$result = $departmentRepository->getDetailDepartment($id);

		return view('manage.departments.edit', ['result' => $result]);
	}

    /**
     * Processing department editing
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
	public function postEdit(DepartRequest $request, $id)
	{
		$edit_depart = Department::where('id', $id)->first();
		$edit_depart->depart_name = $request->depart_name;
		$edit_depart->depart_phone = $request->depart_phone;
		$edit_depart->depart_note = $request->depart_note;
		$edit_depart->save();

		return redirect('departments/edit/' . $id);
	}

	public function destroy($id)
	{
		if (isset($id)) {
			$delete_depart = Department::where('id', $id)->first();
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
		return back();
	}
}
