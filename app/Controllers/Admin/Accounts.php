<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Accounts extends BaseController
{
	public function index()
	{
		$data['title'] = "Account Management";
		return view('admin/accounts/accounts',$data);
	}

}
