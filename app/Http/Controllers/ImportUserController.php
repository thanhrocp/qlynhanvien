<?php

namespace App\Http\Controllers;

use Alert;
use App\Imports\UsersImport;
use App\User;
use Excel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Validators\ValidationException;
use Validator;
use Maatwebsite\Excel\HeadingRowImport;

class ImportUserController extends Controller {
	public function __construct(UsersImport $users)
	{
		$this->users = $users;
	}

	public function getImport()
	{
		# code...
		return view('manage.users.import_data');
	}
	/*-------Import Excel List Employees*/
	public function postImport(Request $request)
	{
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
				$headings = (new HeadingRowImport)->toArray($request->file('ExcelUser'));
				foreach ($headings[0] as $heading) {
					if($heading[0] != "stt" && $heading[1] != "name" && $heading[2] != "email") {
						return back()->with('message','Các trường đầu tiên A1:B1:C1 phải là A1:stt, B1:name, C1:email');
					}
				}
				$users = Excel::toCollection(new UsersImport, request()->file('ExcelUser'));
				foreach ($users[0] as $user) {
					if($user[0] == "stt" || $user[1] == "name" || $user[2] == "email") {
						continue;
					} 
					unset($users[0][0]);
					return view('manage.users.info_import_excel',compact('users'));
					$check_exists = User::where('email', $user[2])->count();
					if ($check_exists == 0) {
						User::where('email', $user[2])->limit(false, 2)->create([
							'name' => $user[1],
							'email' => $user[2],
							'password' => bcrypt(123456),
							'change_password' => 0,
							'role_id' => 3,
						]);
					} else {
						User::where('email', $user[2])->update([
							'name' => $user[1],
							'email' => $user[2],
							'change_password' => 0,
							'role_id' => 3,
						]);
					}
				}
			} catch (ValidationException $e) {
				$fail = $this->user->import($request->file('ExcelUser'));
				$error = $fail->failures();
				foreach ($error as $errors) {
					//
				}
			}
			Alert::success('Upload thành công');
			return back();
		}
	}

	public function confirmExcel()
	{
		return view('manage.users.info_import_excel');
	}
}
