<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\SubscriberModel;

class Dashboard extends BaseController
{
	public function index()
	{
		$now = date('m/d/Y');
		$account = new AccountModel();
		$data['subs'] = $account->select('*, accounts.id as acc_id, accounts.status as acc_status')
						->join('subscribers', 'accounts.subscriber_id=subscribers.id')
						->where('accounts.status="Active"')
						->where('due_date <', $now)
						->findAll();
						 
		$data['title'] = "Dashboard";
		return view('admin/dashboard',$data);
	}

    public function dashboard()
	{
		echo 1;
	}

}
