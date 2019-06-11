<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithLimit;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class UsersImport implements WithMappedCells, ToModel, WithLimit, WithBatchInserts {
	/**
	 * @param array $row
	 *
	 * @return \Illuminate\Database\Eloquent\Model|null
	 */
	public function mapping(): array
    {
        return [
        	'stt' =>'A1',
            'name'  => 'B1',
            'email' => 'C1',
        ];
    }

	public function model(array $row) {
		 if(empty($row[1]) || empty($row[2])) {
            return false;
        }
		return new User([
			'name' => $row[1],
			'email' => $row[2],
		]);
	}

	public function rules(): array{
		return [
			'name' => 'required',
			'email' => 'required|email|unique:users,email',
		];
	}

	public function limit(): int {
		return 5;
	}

    public function customValidationMessages() {
        return [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng'
        ];
    }

    public function batchSize(): int
    {
        return 500;
    }
}