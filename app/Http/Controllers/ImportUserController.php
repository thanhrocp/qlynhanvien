<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class ImportUserController extends Controller {
	public function getImport() {
		# code...
		return view('manage.users.import_data');
	}
	/*-------Import Excel List Employees*/
	public function postImport(Request $request) {
		$validator = Validator::make($request->all(), [
			'excel_user' => 'required|mimes:xls,xlsx',
		],
			[
				'excel_user.required' => 'chưa có file nào',
				'excel_user.mimes' => 'File phải có đuôi .xls, .xlsx',
			]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			if ($request->hasFile('excel_user')) {
				$path = $request->file('excel_user');
				$data = Excel::import(new UsersImport, $path);
			}
		}
	}
}
