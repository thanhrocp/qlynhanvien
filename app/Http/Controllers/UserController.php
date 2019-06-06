<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests\UserRequest;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Mail;
use Redirect;

class UserController extends Controller {
	/*-------------show info user------------------*/
	protected function getInfo() {
		return User::select(DB::raw('CASE WHEN users.role_id=1 THEN "Manage"
			WHEN users.role_id=2 THEN "Employee"
			ELSE "Admin" END as permission'),
			'users.name', 'users.email', 'users.id', 'users.created_at');
	}
	public function index() {
		$list = $this->getInfo()->paginate(5);
		return view('manage.users.list', ['list' => $list]);
	}
	/*-------------show form add user------------------*/
	public function create() {
		return view('manage.users.add');
	}
	/*-------------create user------------------*/
	public function store(UserRequest $request) {
		$add_user = new User;

		$add_user->role_id = $request->role_id;
		$add_user->name = $request->name;
		$add_user->email = $request->email;
		$add_user->password = bcrypt($request->password);

		$add_user->save();

		Alert::success('Thông báo ! Thêm mới thành công');
		return back();
	}
	public function getLogin() {
		return view('manage.login');
	}
	/*-------------get Info login------------------*/
	protected function infoLogin(Request $req) {
		return [
			'email' => $req->email,
			'password' => $req->password,
		];
	}
	/*-------------Post login------------------*/
	public function postLogin(Request $req) {
		$remember = $req->has('remember') ? true : false;

		if (Auth::attempt($this->infoLogin($req), $remember)) {
			if (Auth::user()->change_password == 0) {
				return redirect(route('changepass'));
			} else {
				return redirect('home');
			}
		} else {
			Alert::success('Không cho vào');

			return redirect()->back();
		}
	}
	/*-------------Get logout------------------*/
	public function getLogout(Request $req) {
		Auth::logout();

		$req->session()->flush();

		$req->session()->invalidate();

		return redirect(\URL::previous());
	}
	/*-------------Delete user------------------*/
	public function destroy($id) {
		$delete_user = User::findOrFail($id);

		if ($delete_user->role_id != 1) {
			$delete_user->delete($id);

			return response()->json(['success' => 1]);
		}
	}
	/*-------------show  form edit user----------*/
	public function edit($id) {
		$edit_user = User::findOrFail($id);

		return view('manage.users.edit', ['edit_user' => $edit_user]);
	}
	/*----------- Update user ------------*/
	public function update(Request $request, $id) {
		$account = User::findOrFail($id);
		$account->name = $request->name;
		$account->role_id = $request->role_id;
		$account->password = bcrypt($request->password);
		$account->save();
		Alert::success('Thông báo ! Sửa tài khoản thành công');
		return redirect('users/edit/' . $id);
	}
	/*------------reset passwor------------*/
	public function resetpass(Request $request) {
		$email = $request->input('resetPass', []);
		$info = User::whereIn('email', $email)->first();
		$rand_password = rand(111111, 999999);
		$new_password = bcrypt($rand_password);
		DB::table('users')->update(['password' => $new_password, 'change_password' => 0]);
		$data = [
			'name' => $info->name,
			'password' => $rand_password,
			'email' => $email,
		];
		Mail::send('manage.users.resetpass', $data, function ($mess) use ($email) {
			$mess->to($email)->subject('Mật khẩu mới của bạn');
		});
		Alert::success('Reset mật khẩu thành công');
		return redirect()->back();
	}
	/*-----------show Change pass------------*/
	public function showChangePass() {
		return view('manage.users.changepass');
	}
	/*-----------Change pass------------*/
	public function ChangePass(Request $request) {
		$this->validate($request, [
			'password' => 'min:8',
			'passwordagain' => 'same:password',
		]);
		$userOnl = Auth::user()->id;
		$change_pass = User::where('id', $userOnl)->first();

		$change_pass->password = bcrypt($request->password);
		$change_pass->change_password = 1;
		$change_pass->save();

		Alert::success('Đổi mật khẩu thành công');
		Auth::logout();
		$request->flush();
		return redirect('/');
	}
}
