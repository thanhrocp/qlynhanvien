<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Excel;
use App\Imports\EmployeesImport;
use App\Models\Employee;
use Alert;

class EmployImportController extends Controller
{
	public function postImport(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'EmployExcel' => ' required|mimes:xls,xlsx',
		], [

			'EmployExcel.required' => 'File không được để trống',
			'EmployExcel.mimes' => 'File phải có đuôi .xls .xlsx',
		]);
		if($validator->fails()) {
			return back()->withErrors($validator);
		} else {
			try {
				$employ = Excel::toCollection(new EmployeesImport, request()->file('EmployExcel'));
				foreach ($employ[0] as $employs) {
					if($employs[0] == "stt" || $employs[1] == "depart_id" || $employs[2] == "user_id") {
						continue;
					}
					$check_exists = Employee::where('depart_id', $employs[1])->orWhere('user_id', $employs[2])->count();
					if($check_exists == 0) {
						Employee::where('depart_id', $employs[1])->orWhere('user_id', $employs[2])->create([
							'depart_id' => $employs[1],
							'user_id' => $employs[2],
							'birth_date' => $employs[3],
							'first_name' => $employs[4],
							'last_name' => $employs[5],
							'gender' => $employs[6],
							'education' => $employs[7],
							'identity_card' => $employs[8],
							'dateofissue' => $employs[9],
							'issued_by' => $employs[10],
							'religion' => $employs[11],
							'nation' => $employs[12],
							'marital_status' => $employs[13],
						]);
					} else {
						Employee::where('depart_id', $employs[1])->orWhere('user_id', $employs[2])->update([
							'birth_date' => $employs[3],
							'first_name' => $employs[4],
							'last_name' => $employs[5],
							'gender' => $employs[6],
							'education' => $employs[7],
							'identity_card' => $employs[8],
							'dateofissue' => $employs[9],
							'issued_by' => $employs[10],
							'religion' => $employs[11],
							'nation' => $employs[12],
							'marital_status' => $employs[13],
						]);
					}
				}
			} catch (Maatwebsite\Excel\Validators\ValidationException $e) {
				$e->getMessage();
			}
			Alert()->success('Upload thành công');
			return back();
		}
	}
}
