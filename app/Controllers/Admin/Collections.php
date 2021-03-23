<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransactionModel;

class Collections extends BaseController
{
	public function index()
	{
		$transac = new TransactionModel();

		$data['transac'] = $transac->select('*, accounts.id as acc_id, transactions.id as id, transactions.status as status')
									->join('accounts', 'accounts.id=transactions.account_id')
									->where('transactions.status', 'Pending')
									->orderBy('p_date', 'DESC')
									->findAll();

		$data['title'] = "Collections";
		return view('admin/payments/collections',$data);
	}

}
