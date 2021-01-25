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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
	public function getList(Request $request)
	{
		$departmentRepository = new DepartmentRepository();
        $result = $departmentRepository->getList();
        $pageRow = $request->pageRow ?? config('const.SYSTEM.DEFAULT_ROW');
        $viewAssign = [
            'result' => $result,
            'pageRow' => $pageRow,
        ];
		return view('admin.departments.list', $viewAssign);
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
     * @return \Illuminate\View\View
     */
	public function getEdit()
	{
        $departmentId = $this->getSession('department_id');
		$departmentRepository = new DepartmentRepository();
		$result = $departmentRepository->getDetail($departmentId);

		return view('admin.departments.edit', ['result' => $result]);
	}

    /**
     * Processing department editing
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\View\View
     */
	public function postEdit(Request $request)
	{
        $requestAll = $request->all();
        $departmentRepository = new DepartmentRepository();
        $departmentRequest = new DepartmentRequest();
        if (array_key_exists('request_department_id', $requestAll) === true) {
            $departmentId = $requestAll['request_department_id'];
            $result = $departmentRepository->getDetail($departmentId);
            $this->setSession('department_id', $departmentId);
            $viewAssign = [
                'result' => $result,
            ];
            return view(config('const.SYSTEM.ADMIN') . '.' . 'departments.edit', $viewAssign);
        } else {
            $departmentId = $requestAll['department_id'];
            $departmentRequest->checkForSave($request, $departmentId);
            $this->setSession('request_department_form', $request->except('_token'));
            $this->setSession('department_id', $departmentId);
            return redirect('/departments/confirm');
        }
    }

    /**
     * Confirm added screen
     *
     * @return \Illuminate\View\View
     */
    public function getConfirm()
    {
        $result = $this->getSession('request_department_form');
        return view('admin.departments.confirm', ['result' => $result]);
    }

    /**
     * Confirm added screen
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function postConfirm()
    {
        $departmentRepository = new DepartmentRepository();
        $result = $this->getSession('request_department_form');
        $departmentId = $this->getSession('department_id');
        if (!is_null($result)) {
            if ($departmentId) {
                $departmentRepository->update($result, $departmentId);
                return redirect('/departments/complete');
            }
        }
    }

	/**
     * Confirmation screen completed
     *
     * @return \Illuminate\View\View
     */
	public function getComplete()
	{
        $this->forgetSession('request_department_form');
        $this->forgetSession('department_id');
        $this->forgetSession('request_department_id');
		return view('admin.departments.complete');
	}

	/**
     * Detail screen display
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View|\Illuminate\Routing\Redirector
     */
	public function postDetail(Request $request)
	{
        $requestAll = $request->all();
        if (array_key_exists('request_department_id', $requestAll) === true) {
            $departmentRepository = new DepartmentRepository();
            $result = $departmentRepository->getDetail($requestAll['request_department_id']);
            return view(config('const.SYSTEM.ADMIN'). '.' .'departments.detail', ['result' => $result]);
        }
        return redirect('/departments');
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
		if (isset($id) || !is_null($id)) {
			$departmentRepository = new DepartmentRepository();
			$departmentRepository->delete($id);
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
