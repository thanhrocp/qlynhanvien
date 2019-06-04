<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Alert;
use Image;
use File;
use App\Model\Employees;

class ProfileController extends Controller
{
	/*-----------get Info Personal-------------*/
	public function getInfoPersonal()
	{
        $user = Auth::user()->id;
		return DB::table('employee')->join('users','employee.user_id','=','users.id')
									->join('departments','employee.depart_id','=','departments.id')
									->select(DB::raw('CASE WHEN users.role_id=1 THEN "Admin" WHEN users.role_id=2 THEN "Employee" ELSE "Member" END AS position '),
										'employee.*','departments.depart_name','users.email')
                                    ->where('employee.user_id',$user);
	}
	/*----------------Info Personal-------------*/
    public function personal()
    {
    	# code...
    	$personal['personal'] = $this->getInfoPersonal()->first();

    	return view('manage.profile.personal',$personal);
    }
    /*----------Update profile personal----------*/
    public function update(Request $request)
    {

    	$user = Auth::user()->id;

        $update = Employees::where('user_id',$user)->first();

        $update->birth_date = $request->birth_date;
        $update->first_name = $request->first_name;
        $update->last_name = $request->last_name;
        $update->gender = $request->gender;
        $update->identity_card = $request->identity_card;
        $update->dateofissue = $request->dateofissue;
        $update->issued_by = $request->issued_by;
        $update->religion = $request->religion;
        $update->education = $request->education;
        $update->nation = $request->nation;
        $update->marital_status = $request->marital_status;

        if($request->hasFile('avatar'))
        {
            if($request->file('avatar')->isValid())
            {
                $file_upload = $request->file('avatar');

                $extension = $file_upload->getClientOriginalExtension();

                $file_name = time(). "_" .str_random(10). "_" .rand(1111,9990). "." .$extension;

                $save_file = 'upload/avatar/'.$file_name;

                Image::make($file_upload)->resize(300,300)->save($save_file);

                File::delete("upload/avatar/".$update->avatar);

                $update->avatar = $file_name;
            }
        }

        $update->save();

        Alert::success('Cập nhật thành công');

        return back();

    }
    /*-----------get Info work-------------*/
    public function getInfoWork()
    {
        return DB::table('employ_work');
    }
    /*-----------Show Info work-------------*/
    public function work()
    {
        $work['work'] = $this->getInfoWork()->first();

        return view('manage.profile.work',$work);
    }
    /*--------get Info contact----------*/
    public function getInfoContact()
    {
        $user = Auth::user()->id;
        
        return DB::table('employ_contact')->join('employee','employ_contact.employ_id','=','employee.id')
                                        ->where('employee.user_id',$user);
    }
    /*--------show Info contact----------*/
    public function contact()
    {
        # code...
        $contact['contact'] =  $this->getInfoContact()->first();
        
        return view('manage.profile.contact',$contact);
    }
    /*--------update contact----------*/
    public function contactUpdate(Request $request)
    {
        $employ_id = Auth::user()->employees->id;

        DB::table('employ_contact')->where('employ_id',$employ_id)->update($request->except('_token'));

        Alert::success('Thông báo ! Cập nhật thành công');

        return back();
    }
}
