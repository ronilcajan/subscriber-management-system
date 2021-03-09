<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\SubscriberModel;

class Accounts extends BaseController
{
	public function index()
	{
		$subsModel = new SubscriberModel();
		$data['subs'] = $subsModel->select('*, accounts.id as acc_id')->join('accounts', 'subscribers.id=accounts.subscriber_id')->findAll();

		$data['title'] = "Accounts";
		return view('admin/accounts/accounts',$data);
	}

	public function new_account()
	{
		$subsModel = new SubscriberModel();
		$data['subs'] = $subsModel->findAll();

		$data['title'] = "Creare New Account";
		return view('admin/accounts/new_account',$data);
	}

}
