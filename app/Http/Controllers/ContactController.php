<?php

namespace App\Http\Controllers;

use App\Models\EmployContact;

class ContactController extends Controller
{
	/*---------------get Info---------------*/
	public function __construct(EmployContact $employ)
	{
		$this->employ = $employ;
	}
	/*-----------------show---------------*/
	public function index()
	{
		$info['info'] = $this->employ->InfoContact()->paginate(5);

		return view('admin.contacts.list', $info);
	}
}
