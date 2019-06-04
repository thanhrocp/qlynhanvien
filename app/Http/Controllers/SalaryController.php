<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Validator;

use App\Model\Salary;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminrole');
    }
    protected $rules = [
        'employ_id'=>'unique:salary,employ_id',
        'numberofday'=>'required',
        'numberofot'=>'required',
        'lateday'=>'required',
        'salary'=>'required',
        'allowance'=>'required',
    ];

    public function getInfo()
    {
        return DB::table('employee')->join('departments','employee.depart_id','=','departments.id')
                                    ->join('users','employee.user_id','=','users.id')
                                    ->join('employ_contact','employee.id','=','employ_contact.employ_id')
                                    ->join('employ_work','employee.id','=','employ_work.employ_id')
                                    ->leftJoin('salary','employee.id','=','salary.employ_id')
                                    ->select('employee.first_name','employee.birth_date','employee.id','employee.last_name','employee.marital_status',
                                            DB::raw('CASE WHEN employee.gender=1 THEN "Nam" ELSE "Nữ" END as sex '),
                                            DB::raw('CASE WHEN users.role_id=1 THEN "Quản trị viên" WHEN users.role_id=2 THEN "Quản lý" ELSE "Nhân viên" END AS position'),
                                            DB::raw('CONCAT(employee.first_name," ",employee.last_name) AS full_name'),
                                            'departments.depart_name','employ_contact.ct_phone',
                                            'employ_work.work_code','employ_work.work_email',
                                            'salary.numberofday','salary.numberofot','salary.lateday','salary.salary','salary.allowance','salary.employ_id','salary.id as ids');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info['info'] = $this->getInfo()->get();

        return view('manage.salary.list',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),$this->rules);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else
        {
            $add_salary = new Salary;

            $add_salary->employ_id = $request->input('employ_id');

            $add_salary->numberofday = $request->input('numberofday');

            $add_salary->numberofot = $request->input('numberofot');

            $add_salary->lateday = $request->input('lateday');

            $add_salary->salary = $request->input('salary');

            $add_salary->allowance = $request->input('allowance');

            $add_salary->save();

            return response()->json(['success'=>1]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'numberofday'=>'required',
            'numberofot'=>'required',
            'lateday'=>'required',
            'salary'=>'required',
            'allowance'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else
        {
            DB::table('salary')->where(['id'=>$id])->update($request->only('numberofday','numberofot','lateday','salary','allowance'));

            return response()->json(['success'=>1]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
