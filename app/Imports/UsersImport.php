<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithLimit;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel, WithStartRow, WithLimit {
	/**
	 * @param array $row
	 *
	 * @return \Illuminate\Database\Eloquent\Model|null
	 */
	private $start = 1;

	public function model(array $row) {
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

	public function startRow(): int {
		return $this->start;
	}

	public function limit(): int {
		return 5;
	}

	public function collection(Collection $collection) {
		$this->collection = $collection->transform(function ($row) {

			$this->validationFields($row);

			return [
				'name' => $row[1],
				'email' => $row[2],
			];
		});
	}

	public function validationFields($row) {
		$messages = [
			'required' => 'Cột không được để trống tên',
			'unique' => 'Email đã bị trùng',
		];
		Validator::make($row->toArray(), [
			'name' => 'required',
			'email' => 'required|unique:users,email',
		], $messages)->validate();
	}
}