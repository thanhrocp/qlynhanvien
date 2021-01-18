<?php

namespace App\Imports;

use App\Model\Employees;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employees([
            'depart_id' => $row[1],
            'user_id' => $row[2],
            'birth_date' => $row[3],
            'first_name' => $row[4],
            'last_name' => $row[5],
            'gender' => $row[6],
            'education' => $row[7],
            'identity_card' => $row[8],
            'dateofissue' => $row[9],
            'issued_by' => $row[10],
            'religion' => $row[11],
            'nation' => $row[12],
            'marital_status' => $row[13],
        ]);
    }
}
