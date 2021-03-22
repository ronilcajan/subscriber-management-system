<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\PaymentsModel;
use App\Models\AcountsModel;

class Transactions extends BaseController
{
	public function index()
	{
		$transac = new TransactionModel();

		$data['transac'] = $transac->select('*, accounts.id as acc_id, transactions.id as id, transactions.status as status')
									->join('accounts', 'accounts.id=transactions.account_id')
									->where('transactions.status', 'Paid')
									->orderBy('p_date', 'DESC')
									->findAll();

		$data['title'] = "Transactions";
		return view('admin/payments/transactions',$data);
	}

	public function update(){

		if ($this->request->getMethod() == 'post') {

			$id = $this->request->getVar('id');

			$rules = [
				'id' => 'required',
				'account' 	=> 'required',
				'date_paid' => 'required',
				'amount' 	=> 'required',
			];
			$errors = [
				'id' 	=> [
					'required' => 'ID is required.',
				],
				'account' 	=> [
					'required' => 'Account name is required.',
				],
				'date_paid' 	=> [
					'required' => 'Date paid is required.',
				],
				'amount' 	=> [
					'required' => 'Payment amount is required.',
				],
			];

			if (!$this->validate($rules,$errors)) {

				return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
				
			}else{

				$trans = new TransactionModel();

				$acc = [
					'id' => $id,
					'notes' => $this->request->getVar('notes'),
					'p_date' => $this->request->getVar('date_paid'),
					'payment' => $this->request->getVar('amount'),
				];

				$update = $trans->save($acc);

				if($update){
					return redirect()->back()->with('message', 'Transaction has been updated!');
				}
				return redirect()->back()->withInput()->with('error', 'Updating transactions is not successfull. Please review and try again!');
			}
		}
		return redirect()->back()->withInput()->with('error', 'Submitted form is now allowed!');
	}

}
