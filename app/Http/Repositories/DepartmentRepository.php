<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Department;

class DepartmentRepository
{
    /**
     * get a list of departments
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getList()
    {
        $department = new Department();
        $results =  $department->orderBy('id','desc')->paginate(10);
        return $results;
    }

    /**
     * Get department detail
     *
     * @param string $id
     * @return array $result
     */
    public function getDetail(string $id)
    {
        $department = new Department();
        $result =  $department->where('id', $id)->first();
        return $result;
    }

    /**
     * Add new
     *
     * @param array $formInput
     * @return string $id
     */
    public function intert(array $formInput)
    {
        $department = new Department();
        $formInput = $department->autoSettingBy($formInput);

        $model = DB::transaction(function () use ($department, $formInput) {
            $result = $department->create($formInput);
            return $result;
        });

        return $model->id;
    }
}
