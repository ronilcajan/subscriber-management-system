<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\SubscriberModel;
use App\Models\PaymentModel;
use App\Models\TransactionModel;
use CodeIgniter\I18n\Time;

class Payments extends BaseController
{
	public function index()
	{
		$account = new AccountModel();
		$data['subs'] = $account->select('*, accounts.id as acc_id, accounts.status as acc_status')
						->join('subscribers', 'accounts.subscriber_id=subscribers.id')
						->join('payments', 'payments.account_id=accounts.id')
						->where('accounts.status="Active"')
						->findAll();

		$data['title'] = "Payments";
		return view('admin/payments/payments',$data);
	}

	public function paynow(){
		if ($this->request->getMethod() == 'post') {

			$rules = [
				'account' 	=> 'required',
				'pment' => 'required',
				'id' 	=> 'required',
				'date_paid' => 'required'
			];
			$errors = [
				'pment' 	=> [
					'required' => 'Please select payment amount.',
				],
				'account' 	=> [
					'required' => 'Account name is required.',
				],
				'id' 	=> [
					'required' => 'ID is required.',
				],
				'date_paid' 	=> [
					'required' => 'Date is required.',
				]
			];

			if (!$this->validate($rules,$errors)) {

				return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
				
			}else{
				$id = $this->request->getVar('id');

				$account = new AccountModel();
				$payment = new PaymentModel();
				$transac = new TransactionModel();

				$acc = $account->join('payments','accounts.id=payments.account_id')->find($id);
				$no_pay = $this->request->getVar('pment');

				if(empty($acc['date_paid'])){
					if($no_pay == 1){
						$pay_for = date('F d, Y', strtotime($acc['due_date']));
						$description = 'Payment for '.$pay_for;
					}else{
						$date_paid = Time::parse($acc['due_date']);
						$new_date_paid = $date_paid->addMonths($no_pay-1);
						$pay_for = $new_date_paid->toLocalizedString('MMM d, yyyy');
						$description = 'Payment for '.$pay_for;
					}

				}else{

					$date_paid = Time::parse($acc['date_paid']);
					$new_date_paid = $date_paid->addMonths($no_pay);
					$pay_for = $new_date_paid->toLocalizedString('MMM d, yyyy');

					$description = 'Payment for '.$pay_for;
					
				}

				$tran_details = [
					'account_id' => $id,
					'description' => $description,
					'notes' => $this->request->getVar('notes'),
					'p_date' => $this->request->getVar('date_paid'),
				];

				$insert = $transac->save($tran_details);

				if($insert){

					$due_date = Time::parse($acc['due_date']);
					$old_due_date = $due_date->addMonths($no_pay);
					$new_due_date = $old_due_date->toLocalizedString('MM/dd/yyyy');

					$dtls = [
						'id' => $id,
						'due_date' => $new_due_date
					];

					$account->save($dtls);

					$pay_dtls = [
						'date_paid' => date('m/d/Y', strtotime($pay_for)),
						'due_date' => $new_due_date
					];

					$payment->set($pay_dtls)->where('account_id', $id)->update();

					return redirect()->back()->with('message', 'Payment has been created!');
				}
				
				return redirect()->back()->with('errors', 'Adding new account is not successfull. Please review and try again!');
				
			}
		}
		return redirect()->back()->withInput()->with('error', 'Submitted form is now allowed!');
	}

	public function getPayment(){
		$validator = array('success' => false, 'pment'=> array(), 'test'=> array());

		if ($this->request->getMethod() == 'post') {
			$pment = array();

			$id = $this->request->getVar('id');
			$account = new AccountModel();
			
			$acc = $account->join('payments','accounts.id=payments.account_id')->find($id);

			$date_started = Time::parse($acc['date_started']);
			$due_date = Time::parse($acc['due_date']);
			$todayMonth = Time::parse(date('Y-m-01'));

			$todayDate = $todayMonth->addDays($acc['schedule'] - 1); // format todays date into 5th day of the month to match the schedule

			$monthly = $acc['monthly'];
			$dailyPay = round($monthly / 30, 2); //calculate everyday payment

			if(empty($acc['date_paid'])){
			
				$no_days = $this->diffDays($date_started, $due_date); // get the number of days before due date
				$fee = round($dailyPay * abs($no_days)); //calculate total payment

				if(date('m', strtotime($acc['due_date'])) == 3){ // check if month is february-march because it only have 28-29 for month
					$pment[] = array('no' => 1, 'pay' => $monthly);
				}else{
					$pment[] = array('no' => 1, 'pay' => $fee);
				}

				$no_months = $this->diffMonths($due_date, $todayDate); // get the no. of month between due date and todays month
				
				if($no_months < 0){
					for($i=0; $i < abs($no_months); $i++){
						
						$pment[] = array('no' => $i+2 , 'pay' => $monthly + $fee );

						$monthly += $monthly;
					}
				}


			}else{

				$pment[] = array('no' => 1, 'pay' => $monthly);

				$no_months = $this->diffMonths($due_date, $todayDate);
				
				if($no_months < 0){
					for($i=0; $i < abs($no_months); $i++){
						
						$pment[] = array('no' => $i+2 , 'pay' => $monthly+$monthly);

						$monthly += $monthly;
					}
				}
			}
			
			$validator['success'] = true;
			$validator['pment'] = $pment;
		}

		echo json_encode($validator);
	}

	public function diffDays($from, $to){
		$diff = $from->difference($to);
		$result = (int)$diff->Days;
		return $result;
	}
	public function diffMonths($from, $to){
		$diff = $from->difference($to);
		$result = $diff->Months;
		return $result;
	}
}
