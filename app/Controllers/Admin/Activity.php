<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Activity extends BaseController
{
	public function index()
	{
		$data['title'] = "Activity Logs";
		return view('admin/activity',$data);
	}

}
