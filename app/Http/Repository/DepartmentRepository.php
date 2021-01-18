<?php

namespace App\Http\Repository;

use App\Model\Department;

class DepartmentRepository {
    public function getListDepartment()
    {
        $department = new Department();
        $return =  $department->orderBy('id','desc')->paginate(10);

        return $return;
    }

    public function getDetailDepartment(string $id)
    {
        $department = new Department();
        $return =  $department->where('id', $id)->first();

        return $return;
    }
}