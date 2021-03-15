<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\SubscriberModel;

class Payments extends BaseController
{
	public function index()
	{
		$account = new AccountModel();
		$data['subs'] = $account->select('*, accounts.id as acc_id, accounts.status as acc_status')
						->join('subscribers', 'accounts.subscriber_id=subscribers.id')
						->where('accounts.status="Active"')
						->findAll();

		$data['title'] = "Payments";
		return view('admin/payments/payments',$data);
	}

}
