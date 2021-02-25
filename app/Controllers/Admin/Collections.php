<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Collections extends BaseController
{
	public function index()
	{
		$data['title'] = "Collections";
		return view('admin/payments/collections',$data);
	}

}
