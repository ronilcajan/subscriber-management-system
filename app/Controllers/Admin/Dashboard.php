<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\SubscriberModel;
use App\Models\TransactionModel;

class Dashboard extends BaseController
{
	public function index()
	{
		$db = db_connect();
		$now = date('m/d/Y');

		$account = new AccountModel();
		$subs = new SubscriberModel();
		$trans = new TransactionModel();

		$data['clients'] = $subs->where('status', 'Active')->countAllResults();
		$data['accounts'] = $account->where('status', 'Active')->countAllResults();
		$data['unpaid'] = $account->select('*, accounts.id as acc_id, accounts.status as acc_status')
									->join('subscribers', 'accounts.subscriber_id=subscribers.id')
									->where('accounts.status="Active"')
									->where('due_date <', $now)->countAllResults();
		$data['paid'] = $account->select('*, accounts.id as acc_id, accounts.status as acc_status')
									->join('subscribers', 'accounts.subscriber_id=subscribers.id')
									->where('accounts.status="Active"')
									->where('due_date >', $now)->countAllResults();
		$data['month'] = $trans->selectSum('payment')
								->where('YEAR(p_date)', date('Y'))
								->where('MONTH(p_date)', date('m'))
								->first();
		$data['daily'] = $trans->selectSum('payment')
								->where('YEAR(p_date)', date('Y'))
								->where('MONTH(p_date)', date('m'))
								->where('DAY(p_date)', date('d'))
								->first();
		$data['total'] = $trans->selectSum('payment')->first();
		$data['year'] = $trans->selectSum('payment')
							->where('YEAR(p_date)', date('Y'))
							->first();;

		$data['subs'] = $account->select('*, accounts.id as acc_id, accounts.status as acc_status')
						->join('subscribers', 'accounts.subscriber_id=subscribers.id')
						->where('accounts.status="Active"')
						->where('due_date <', $now)
						->findAll();

		$query = $db->query("SELECT *,activity_log.created_at as created_at  FROM activity_log JOIN users ON users.id = activity_log.user_id ORDER BY activity_log.created_at DESC LIMIT 10");
		$data['acti'] = $query->getResultArray();

		$data['title'] = "Dashboard";
		return view('admin/dashboard',$data);
	}

	public function system(){

		$data['title'] = "System Info";
		return view('system',$data);
	}
}
