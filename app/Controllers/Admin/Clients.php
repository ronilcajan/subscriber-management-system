<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Clients extends BaseController
{
	public function index()
	{
		$data['title'] = "Client Management";
		return view('admin/clients/clients',$data);
	}

}
