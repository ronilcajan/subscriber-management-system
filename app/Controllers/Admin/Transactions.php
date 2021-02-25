<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Transactions extends BaseController
{
	public function index()
	{
		$data['title'] = "Transactions";
		return view('admin/payments/transactions',$data);
	}

}
