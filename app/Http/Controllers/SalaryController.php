<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use DB;
use Illuminate\Http\Request;
use Validator;

class SalaryController extends Controller {
	public function __construct(Salary $salary) {
		$this->salary = $salary;
		$this->middleware('adminrole');
	}
	protected $rules = [
		'employ_id' => 'unique:salary,employ_id',
		'numberofday' => 'required',
		'numberofot' => 'required',
		'lateday' => 'required',
		'salary' => 'required',
		'allowance' => 'required',
	];

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$info['info'] = $this->salary->getInfo()->get();

		return view('admin.salary.list', $info);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$validator = Validator::make($request->all(), $this->rules);

		if ($validator->fails()) {
			return response()->json(['errors' => $validator->errors()->all()]);
		} else {
			$add_salary = new Salary;

			$add_salary->employ_id = $request->input('employ_id');

			$add_salary->numberofday = $request->input('numberofday');

			$add_salary->numberofot = $request->input('numberofot');

			$add_salary->lateday = $request->input('lateday');

			$add_salary->salary = $request->input('salary');

			$add_salary->allowance = $request->input('allowance');

			$add_salary->save();

			return response()->json(['success' => 1]);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$validator = Validator::make($request->all(), [
			'numberofday' => 'required',
			'numberofot' => 'required',
			'lateday' => 'required',
			'salary' => 'required',
			'allowance' => 'required',
		]);

		if ($validator->fails()) {
			return response()->json(['errors' => $validator->errors()->all()]);
		} else {
			DB::table('salary')->where(['id' => $id])->update($request->only('numberofday', 'numberofot', 'lateday', 'salary', 'allowance'));

			return response()->json(['success' => 1]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
