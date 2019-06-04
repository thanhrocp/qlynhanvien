<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\EmployWork;

use DB;

use Alert;

class EmployeeWorkController extends Controller
{
	/*--------------get info----------------*/
	public function getInfo($id)
	{
		return EmployWork::where('employ_id',$id)->first();
	}
    /*--------------show form----------------*/
    public function index($id)
    {
    	# code...
    	$info = $this->getInfo($id);

    	return view('manage.employees.add_work',['info'=>$info]);
    }
    /*--------------update info work----------------*/
    public function update(Request $request, $id)
    {
    	$checkExists = DB::table('employ_work')->where('employ_id',$id)->count();

    	if( $checkExists == 0 )
    	{
    		$add = new EmployWork;

    		$employ_id = $id;

    		$add->employ_id = $employ_id;

    		$add->work_code = "NV0000".rand(1000,9999);

    		$add->work_email = $request->work_email;

    		$add->probationary_day = $request->probationary_day;

    		$add->joining_date = $request->joining_date;

    		$add->contract_type = $request->contract_type;

    		$add->bank_account = $request->bank_account;

    		$add->bank_name = $request->bank_name;

    		$add->day_off = $request->day_off;

    		$add->reason_leave = $request->reason_leave;

    		$add->save();

    		Alert::success('Thông báo ! Thêm mới thành công');

    		return redirect('employees/edit/'.$id.'/work');
    	}
    	else
    	{
    		$update = DB::table('employ_work')->where('employ_id',$id);

    		$update->update($request->except('_token'));

    		Alert::success('Thông báo ! Cập nhật thành công');

    		return redirect('employees/edit/'.$id.'/work');
    	}
    }
}
