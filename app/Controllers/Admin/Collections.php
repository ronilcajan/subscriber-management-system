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

		if(in_groups('admin')){
			return view('admin/payments/collections',$data);
		}
		if(in_groups('collector')){
			return view('collector/collections',$data);
		}

	}

	public function approve($id){

		$accModel = new TransactionModel();

		$data = [
			'id' => $id,
			'status' => 'Paid',
			'updated_at' => date('y-n-j G:i:s')
		];

		$approve = $accModel->save($data);

		if($approve){
			
			return redirect()->back()->with('message', 'Transaction has been approved!');
		}
	}

}
