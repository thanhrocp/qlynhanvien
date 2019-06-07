<?php

namespace App\Http\Controllers;

use Alert;
use App\Imports\UsersImport;
use App\User;
use Excel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Validators\ValidationException;
use Validator;

class ImportUserController extends Controller {
	public function getImport() {
		# code...
		return view('manage.users.import_data');
	}
	/*-------Import Excel List Employees*/
	public function postImport(Request $request) {
		$validator = Validator::make($request->all(), [
			'ExcelUser' => 'required|mimes:xls,xlsx',
		], [
			'ExcelUser.required' => 'chưa có file nào',
			'ExcelUser.mimes' => 'File phải có đuôi .xls, .xlsx',
		]);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			try {
				$users = Excel::toCollection(new UsersImport, request()->file('ExcelUser'));
				foreach ($users[0] as $users) {
					$check_exists = User::where('email', $users[2])->count();
					if ($check_exists == 0) {
						User::where('email', $users[2])->limit(false, 2)->create([
							'name' => $users[1],
							'email' => $users[2],
							'password' => bcrypt(123456),
							'change_password' => 0,
							'role_id' => 3,
						]);
					} else {
						User::where('email', $users[2])->update([
							'name' => $users[1],
							'email' => $users[2],
							'change_password' => 0,
							'role_id' => 3,
						]);
					}
				}
				Alert::success('Upload thành công');
				return back();
			} catch (ValidationException $e) {
				// $import = new UsersImport();
				// $import->import($request->file('ExcelUser'));
				// dd($import->errors());
				// foreach ($import->errors() as $errors) {
				// 	$errors->errors();
				//}
			}
		}
	}
}
