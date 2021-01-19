<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use App\Model\Department;

class DepartmentRepository {
    /**
     * get a list of departments
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListDepartment()
    {
        $department = new Department();
        $return =  $department->orderBy('id','desc')->paginate(10);

        return $return;
    }

    /**
     * Get department detail
     *
     * @param string $id
     * @return array $results
     */
    public function getDetailDepartment(string $id)
    {
        $department = new Department();
        $results =  $department->where('id', $id)->first();

        return $results;
    }

    /**
     * Add new
     *
     * @param array $formInput
     * @return string $id
     */
    public function intert(array $formInput)
    {
        $formInputSave = collect($formInput)->slice(1);
        $deparment = new Department();
        $model = DB::transaction(function () use ($deparment, $formInputSave) {
            $result = $deparment->create($formInputSave->all());
            return $result;
        });

        return $model->id;
    }
}
