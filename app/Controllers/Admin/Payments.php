<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Payments extends BaseController
{
	public function index()
	{
		$data['title'] = "Payments";
		return view('admin/payments/payments',$data);
	}

}
