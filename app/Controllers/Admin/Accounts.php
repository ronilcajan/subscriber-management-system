<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\SubscriberModel;

class Accounts extends BaseController
{
	public function index()
	{
		$account = new AccountModel();
		$data['subs'] = $account->select('*, accounts.id as acc_id, accounts.status as acc_status')
						->join('subscribers', 'accounts.subscriber_id=subscribers.id')
						->findAll();

		$data['title'] = "Accounts";
		return view('admin/accounts/accounts',$data);
	}

	public function new_account()
	{
		$subsModel = new SubscriberModel();
		$data['subs'] = $subsModel->findAll();

		$data['title'] = "Create New Account";
		return view('admin/accounts/new_account',$data);
	}

	public function edit_account($id)
	{
		$subsModel = new SubscriberModel();
		$account = new AccountModel();
		$data['subs'] = $subsModel->findAll();
		$data['acc'] = $account->join('subscribers', 'accounts.subscriber_id=subscribers.id')->find($id);

		$data['title'] = "Update This Account";
		return view('admin/accounts/edit_account',$data);
	}

	public function account_info($id)
	{
		$account = new AccountModel();
		$data['acc'] = $account->select('*, accounts.status as stats')->join('subscribers', 'accounts.subscriber_id=subscribers.id')->find($id);

		$data['title'] = "Account Info";
		return view('admin/accounts/account_info',$data);
	}

	public function create()
	{
		if ($this->request->getMethod() == 'post') {

			$rules = [
				'subs_id' => 'required',
				'account_name' 	=> 'required',
				'area_coverage' => 'required',
				'options' 	=> 'required',
				'monthly' 	=> 'required',
				'device_user' 	=> 'required',
				'business_aff' 	=> 'required',
				'speed' 	=> 'required',
			];
			$errors = [
				'subs_id' 	=> [
					'required' => 'Please select subscribers.',
				],
				'account_name' 	=> [
					'required' => 'Account name is required.',
				],
				'area_coverage' 	=> [
					'required' => 'Area coverage is required.',
				],
				'options' 	=> [
					'required' => 'Please select subscription options.',
				],
				'device_user' 	=> [
					'required' => 'Please select device user.',
				],
				'business_aff' 	=> [
					'required' => 'Please select business affiliate if yes or no.',
				],
				'speed' 	=> [
					'required' => 'Please select the download and upload speed.',
				],
			];

			if (!$this->validate($rules,$errors)) {

				return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
				
			}else{

				$account = new AccountModel();

				$subs_id = $this->request->getVar('subs_id');

				$new_acc = [
					'subscriber_id' => $subs_id,
					'account_name' => $this->request->getVar('account_name'),
					'area_coverage' => $this->request->getVar('area_coverage'),
					'google_coordinate' => $this->request->getVar('google_coor'),
					'antenna_model' => $this->request->getVar('antenna'),
					'date_accomplished' => $this->request->getVar('date_acc'),
					'due_date' => $this->request->getVar('due_date'),
					'subs_option' => $this->request->getVar('options'),
					'monthly' => $this->request->getVar('monthly'),
					'device_user' => $this->request->getVar('device_user'),
					'b_affiliates' => $this->request->getVar('business_aff'),
					'speed' => $this->request->getVar('speed'),
				];

				$insert = $account->save($new_acc);

				if($insert){
					return redirect()->back()->with('message', 'New subscriber has been added!');
				}
				return redirect()->back()->with('errors', 'Adding new account is not successfull. Please review and try again!');
				
			}
		}
		return redirect()->back()->withInput()->with('error', 'Submitted form is now allowed!');
	}
	public function update()
	{
		if ($this->request->getMethod() == 'post') {

			$rules = [
				'subs_id' => 'required',
				'account_name' 	=> 'required',
				'area_coverage' => 'required',
				'options' 	=> 'required',
				'monthly' 	=> 'required',
				'device_user' 	=> 'required',
				'business_aff' 	=> 'required',
				'speed' 	=> 'required',
			];
			$errors = [
				'subs_id' 	=> [
					'required' => 'Please select subscribers.',
				],
				'account_name' 	=> [
					'required' => 'Account name is required.',
				],
				'area_coverage' 	=> [
					'required' => 'Area coverage is required.',
				],
				'options' 	=> [
					'required' => 'Please select subscription options.',
				],
				'device_user' 	=> [
					'required' => 'Please select device user.',
				],
				'business_aff' 	=> [
					'required' => 'Please select business affiliate if yes or no.',
				],
				'speed' 	=> [
					'required' => 'Please select the download and upload speed.',
				],
			];

			if (!$this->validate($rules,$errors)) {

				return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
				
			}else{

				$account = new AccountModel();

				$acc = [
					'id' => $this->request->getVar('id'),
					'subscriber_id' => $this->request->getVar('subs_id'),
					'account_name' => $this->request->getVar('account_name'),
					'area_coverage' => $this->request->getVar('area_coverage'),
					'google_coordinate' => $this->request->getVar('google_coor'),
					'antenna_model' => $this->request->getVar('antenna'),
					'date_accomplished' => $this->request->getVar('date_acc'),
					'due_date' => $this->request->getVar('due_date'),
					'subs_option' => $this->request->getVar('options'),
					'monthly' => $this->request->getVar('monthly'),
					'device_user' => $this->request->getVar('device_user'),
					'b_affiliates' => $this->request->getVar('business_aff'),
					'speed' => $this->request->getVar('speed'),
				];

				$insert = $account->save($acc);

				if($insert){
					return redirect()->back()->with('message', 'Account has been update!');
				}
				return redirect()->back()->withInput()->with('error', 'Updating new account is not successfull. Please review and try again!');
			}
		}
		return redirect()->back()->withInput()->with('error', 'Submitted form is now allowed!');
	}

	public function delete($id)
	{
		$accModel = new AccountModel();
		if($id) {
			$accModel->delete($id);
			return redirect()->back()->withInput()->with('error', 'Account has been deleted!');
		}
	}

	public function changeStatus()
	{
		$validator = array('success' => false);

		if ($this->request->getMethod() == 'post') {
			$accModel = new AccountModel();
			$id = $this->request->getVar('id');

			$data = [
				'status' => $this->request->getVar('status'),
				'updated_at' => date('y-n-j G:i:s')
			];

			$update = $accModel->set($data)->update($id);

			if($update){
				
				$validator['success'] = true;
			}
		}

		echo json_encode($validator);
		
	}
}
