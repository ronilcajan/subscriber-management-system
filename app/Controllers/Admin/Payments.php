<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\SubscriberModel;
use App\Models\PaymentModel;
use App\Models\TransactionModel;
use CodeIgniter\I18n\Time;
use App\Models\SystemModel;

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
				'id' 	=> 'required',
				'account' 	=> 'required',
				'paymentDate' => 'required',
				'paymentDue' => 'required',
				'totalPay' => 'required',
			];
			$errors = [
				'paymentDue' 	=> [
					'required' => 'Please select a date to pay.',
				],
				'account' 	=> [
					'required' => 'Account name is required.',
				],
				'id' => [
					'required' => 'Account ID is required.',
				],
				'paymentDate' 	=> [
					'required' => 'Payment date is required.',
				],
				'totalPay' => [
					'required' => 'Total payment is required.'
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

				if($acc['date_paid']){
					$noMonths = $this->diffMonths($this->request->getVar('paymentDue'), $acc['date_paid']);
				}else{
					$noMonths = $this->diffMonths($this->request->getVar('paymentDue'), $acc['date_started']);
				}
				
				$tran_details = [
					'account_id' => $id,
					'description' =>  $this->request->getVar('paymentDue'),
					'notes' => $this->request->getVar('notes'),
					'p_date' => $this->request->getVar('paymentDate'),
					'no_months' => abs($noMonths),
					'payment' =>  $this->request->getVar('totalPay'),
				];

				$insert = $transac->save($tran_details);

				if($insert){

					$due_date = Time::parse($this->request->getVar('paymentDue'));
					$new_due_date = $due_date->addMonths(1);
					$dueDatenow = $new_due_date->toLocalizedString('MM/dd/yyyy');

					$dtls = [
						'id' => $id,
						'due_date' => $dueDatenow
					];

					$account->save($dtls);

					$pay_dtls = [
						'date_paid' => $this->request->getVar('paymentDue'),
						'due_date' => $dueDatenow
					];
					
					$name = $this->request->getVar('account');

					$payment->set($pay_dtls)->where('account_id', $id)->update();

					return redirect()->back()->with('message', 'Payment has been created for '.$name.' account !');
				}
				
				return redirect()->back()->with('errors', 'Creating payment is not successfull. Please review and try again!');
				
			}
		}
		return redirect()->back()->withInput()->with('error', 'Submitted form is now allowed!');
	}

	public function getPayment(){
		$validator = array('success' => false, 'pment'=> array(), 'due'=> array(), 'monthly' => array());

		if ($this->request->getMethod() == 'post') {
			$pment = array();

			$id = $this->request->getVar('id');
			$account = new AccountModel();
			
			$acc = $account->join('payments','accounts.id=payments.account_id')->find($id);

			$date_started = Time::parse($acc['date_started']);
			$due_date = Time::parse($acc['due_date']);
			$todayMonth = Time::parse(date('Y-m-01'));

			$todayDate = $todayMonth->addDays($acc['schedule'] - 1); // format todays date into 5th day of the month to match the schedule

			if(empty($acc['date_paid'])){

				$noMonths = $this->diffMonths($date_started, $todayDate);

				if($noMonths == 0){
					
					$pment[] = array('date' => $acc['due_date'], 'formatted_date' => date('F d, Y', strtotime($acc['due_date'])));

				}else{

					for($i=0; $i < abs($noMonths); $i++){
						$dueDate = $this->getDuedates($date_started, $i+1);
						$pment[] = array('date' => $dueDate, 'formatted_date' => date('F d, Y', strtotime($dueDate)));
					}
				}
				$validator['due'] = $acc['date_started'];

			}else{

				$date_paid = Time::parse($acc['date_paid']);
				$noMonths = $this->diffMonths($date_paid, $todayDate);

				if($noMonths == 0){
					
					$pment[] = array('date' => $acc['due_date'], 'formatted_date' => date('F d, Y', strtotime($acc['due_date'])));

				}else{

					for($i=0; $i < abs($noMonths); $i++){
						$dueDate = $this->getDuedates($date_paid, $i+1);
						$pment[] = array('date' => $dueDate, 'formatted_date' => date('F d, Y', strtotime($dueDate)));
					}
					
				}

				$validator['due'] = $acc['date_paid'];
			}	
			
			$validator['success'] = true;
			$validator['pment'] = $pment;
			$validator['monthly'] = $acc['monthly'];
		}

		echo json_encode($validator);
	}

	public function sendEmail($id){

		$pment['amount'] = array();

		$account = new AccountModel();
		
		$acc = $account->join('payments','accounts.id=payments.account_id')->find($id);
		$subs = $account->join('subscribers','subscribers.id=accounts.subscriber_id')->find($id);

		$date_started = Time::parse($acc['date_started']);
		$due_date = Time::parse($acc['due_date']);
		$todayMonth = Time::parse(date('Y-m-01'));

		$monthly = $acc['monthly'];
		$todayDate = $todayMonth->addDays($acc['schedule'] - 1); // format todays date into 5th day of the month to match the schedule
		$perDay = $monthly / 30;
		

		if(empty($acc['date_paid'])){

			$noMonths = $this->diffMonths($date_started, $todayDate);
			
			if($date_started->getDay() == $due_date->getDay()){
				$total = $monthly;
			}else{
				$days = $date_started->difference($due_date);
				$totalDay = $days->getDays(); 
				$total = round(($totalDay) * $perDay , 2);
			}

			if($noMonths == 0){
				$pment['amount'][] = array('amount' => $total, 'formatted_date' => date('F d, Y', strtotime($due_date)));
			}else{
				$pment['amount'][] = array('amount' => $total, 'formatted_date' => date('F d, Y', strtotime($due_date)));
				for($i=1; $i < abs($noMonths); $i++){
					$dueDate = $this->getDuedates($due_date, $i);
					$pment['amount'][] = array('amount' => $total + $monthly, 'formatted_date' => date('F d, Y', strtotime($dueDate)));
					$monthly+=$monthly;
				}
			}

		}else{

			$date_paid = Time::parse($acc['date_paid']);
			$noMonths = $this->diffMonths($date_paid, $todayDate);
			
			if($noMonths == 0){
				$pment['amount'][] = array('amount' => $monthly, 'formatted_date' => date('F d, Y', strtotime($due_date)));
			}else{
				for($i=0; $i < abs($noMonths); $i++){
					$dueDate = $this->getDuedates($date_paid, $i+1);
					$pment['amount'][] = array('amount' => $monthly , 'formatted_date' => date('F d, Y', strtotime($dueDate)));
					$monthly+=$monthly;
				}
			}
		}	

		$pment['name'] = $subs['name'];
		$pment['account'] = $acc['account_name'];

		$sstem = new SystemModel();
		$ss = $sstem->find(1);

		$email = \Config\Services::email();
		$email->setFrom($ss['email'], $ss['name']);
		$email->setTo($subs['email']);

		$email->setSubject('Payment Notification');
		
		$template = view('templates/email_template', $pment);

		$email->setMessage($template);

		if (! $email->send())
		{
			return redirect()->back()->with('errors', 'Sending email notification not successfull.');
		}
		return redirect()->back()->with('message', 'Success! Email notification has been sent.');

	}

	public function diffMonths($d1, $d2){

		$ts1 = strtotime($d1);
		$ts2 = strtotime($d2);

		$year1 = date('Y', $ts1);
		$year2 = date('Y', $ts2);

		$month1 = date('m', $ts1);
		$month2 = date('m', $ts2);

		return $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
	}

	public function getDuedates($date, $no){

		$dueDate = date('Y-m-01', strtotime($date->addMonths($no)));
		$parseDate = Time::parse($dueDate);
		$newdueDate = $parseDate->addDays(4);

		return $newdueDate->toLocalizedString('MM/dd/yyyy');
	}


}
