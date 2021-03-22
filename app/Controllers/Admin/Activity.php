<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Activity extends BaseController
{
	public function index()
	{
		$db = db_connect();
		$query = $db->query("SELECT *,activity_log.created_at as created_at  FROM activity_log JOIN users ON users.id = activity_log.user_id ORDER BY activity_log.created_at DESC");
		$data['acti'] = $query->getResultArray();

		$data['title'] = "System Activity";
		return view('admin/activity',$data);
	}

	public function attempts()
	{
		$db = db_connect();
		$query = $db->query("SELECT * FROM auth_logins ORDER BY date DESC");
		$data['logins'] = $query->getResultArray();

		$data['title'] = "Login Attempts";
		return view('admin/attempts',$data);
	}

}
