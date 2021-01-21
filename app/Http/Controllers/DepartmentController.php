<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Http\Repositories\DepartmentRepository;
use App\Http\Controllers\Base\AdminControllerBase;

class DepartmentController extends AdminControllerBase
{
    /**
     * Manage the list of departments
     *
     * @return \Illuminate\View\View
     */
	public function getList()
	{
		$departmentRepository = new DepartmentRepository();
		$result = $departmentRepository->getList();
		return view('admin.departments.list', ['result' => $result]);
	}

    /**
     * Manage additional departments
     *
     * @return \Illuminate\View\View
     */
	public function getNew()
	{
		return view('admin.departments.new');
	}

    /**
     * Handling new department
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Routing\Redirector
     */
	public function postNew(Request $request)
	{
        $this->setSession('formInput', $request->except('_token'));
        $departmentRequest = new DepartmentRequest();
        $departmentRequest->checkForSave($request);

		return redirect('/departments/detail');
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
		$result = $departmentRepository->getDetail($id);

		return view('admin.departments.edit', ['result' => $result]);
	}

    /**
     * Processing department editing
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Routing\Redirector
     */
	public function postEdit(Request $request, string $id)
	{
        $departmentRequest = new DepartmentRequest();
        $departmentRequest->checkForSave($request);
		$edit_depart = Department::where('id', $id)->first();
		$edit_depart->depart_name = $request->depart_name;
		$edit_depart->depart_phone = $request->depart_phone;
        $edit_depart->depart_note = $request->depart_note;
		$edit_depart->save();

		return redirect('departments/edit/' . $id);
	}

	/**
     * Manage additional departments
     *
     * @return \Illuminate\View\View
     */
	public function getComplete()
	{
		return view('admin.departments.complete');
	}

	/**
     * Manage additional departments
     *
     * @return \Illuminate\View\View
     */
	public function getDetail()
	{
		$result = $this->getSession('formInput');
		return view('admin.departments.detail', ['result' => $result]);
	}

	/**
     * Detail screen display
     *
     * @return \Illuminate\View\View
     */
	public function postDetail()
	{
        $departmentRepository = new DepartmentRepository();
		$departmentRepository->intert($this->getSession('formInput'));
		$this->forgetSession('formInput');

		return redirect('/departments/complete');
	}

    /**
     * Processing department deletion
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     * @return void
     */
	public function getDelete($id)
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
