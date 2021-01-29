<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
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
        $result = $departmentRepository->getList($request);
        $showRecord = $request['show_record'] ?? config('const.SYSTEM.DEFAULT_ROW');
        $viewAssign = [
            'result' => $result,
            'show_record' => $showRecord,
        ];
        $request->flash();
		return view(config('const.SYSTEM.ADMIN') . '.departments.list', $viewAssign);
    }

        /**
     * Manage the list of departments
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
	public function postList(Request $request)
	{
		$departmentRepository = new DepartmentRepository();
        $result = $departmentRepository->getList($request);
        $showRecord = $request['show_record'] ?? config('const.SYSTEM.DEFAULT_ROW');
        $viewAssign = [
            'result' => $result,
            'show_record' => $showRecord,
        ];
		return view(config('const.SYSTEM.ADMIN') . '.departments.list', $viewAssign);
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
        $this->setSession('request_department_form', $request->all());
        $departmentRequest = new DepartmentRequest();
        $departmentRequest->checkForSave($request);

		return redirect('/department/confirm');
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

		return view(config('const.SYSTEM.ADMIN') . '.departments.edit', ['result' => $result]);
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
            return view(config('const.SYSTEM.ADMIN') . '.departments.edit', $viewAssign);
        } else {
            $departmentId = $requestAll['department_id'];
            $departmentRequest->checkForSave($request, $departmentId);
            $this->setSession('request_department_form', $request->all());
            $this->setSession('department_id', $departmentId);
            return redirect('/department/confirm');
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
        return view(config('const.SYSTEM.ADMIN') . '.departments.confirm', ['result' => $result]);
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
                return redirect('/department/complete');
            } else {
                $departmentRepository->intert($result);
                return redirect('/department/complete');
            }
        } else {
            return redirect('/department');
        }
    }

	/**
     * Confirmation screen completed
     *
     * @return \Illuminate\Routing\Redirector
     */
	public function getComplete()
	{
        $this->forgetSession('request_department_form');
        $this->forgetSession('department_id');
        $this->forgetSession('request_department_id');
		return view(config('const.SYSTEM.ADMIN') . '.departments.complete');
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
            return view(config('const.SYSTEM.ADMIN') . '.departments.detail', ['result' => $result]);
        }
        return redirect('/department');
	}

    /**
     * Processing department deletion
     *
     * @param string $id
     * @return \Illuminate\Http\Response|void
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
}
