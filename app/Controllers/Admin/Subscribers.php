<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\SubscriberModel;
use App\Models\PaymentModel;

class Subscribers extends BaseController
{
	public function index()
	{
		$subsModel = new SubscriberModel();

		$data['subs'] = $subsModel->findAll();

		$data['title'] = "Subscribers";
		return view('admin/subscribers/subscribers',$data);
	}

	public function new_subs()
	{
		$data['title'] = "Create New Subscriber";
		return view('admin/subscribers/new_subscriber',$data);
	}

	public function edit($id){

		$subsModel = new SubscriberModel();
		$data['subs'] = $subsModel->select('*,subscribers.id as id, accounts.id as acc_id')->join('accounts', 'subscribers.id=accounts.subscriber_id')->find($id);

		$data['title'] = "Update this Subscriber";
		return view('admin/subscribers/edit_subscriber',$data);
	}

	public function profile($id){

		$subsModel = new SubscriberModel();
		$accModel = new AccountModel();
		$data['subs'] = $subsModel->select('*, subscribers.status as stats')->join('accounts', 'subscribers.id=accounts.subscriber_id')->find($id);
		$data['acc'] = $accModel->select('*, accounts.status as stats, accounts.id as acc_id')->join('subscribers', 'subscribers.id=accounts.subscriber_id')->where('subscriber_id', $id)->findAll();

		$data['title'] = "Subscriber Profile";
		return view('admin/subscribers/subscriber_profile',$data);
	}

	public function create()
	{
		if ($this->request->getMethod() == 'post') {

			$rules = [
				'name'  	=> 'required',
				'phone' 	=> 'required',
				'email' 	=> 'required|valid_email|is_unique[subscribers.email]',
				'fb_name' 	=> 'required',
				'fb_url' 	=> 'required|valid_url',
				'street' 	=> 'required',
				'city' 	=> 'required',
				'province' 	=> 'required',
				'account_name' 	=> 'required',
				'area_coverage' 	=> 'required',
				'date_started' 	=> 'required',
				'options' 	=> 'required',
				'monthly' 	=> 'required',
				'device_user' 	=> 'required',
				'business_aff' 	=> 'required',
				'speed' 	=> 'required',
			];
			$errors = [
				'fb_name' 	=> [
					'required' => 'Subscriber facebook name is required.'
				],
				'fb_url' 	=> [
					'required' => 'Facebook URL is required.',
					'valid_url' => 'Facebook URL is invalid.',
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
				'date_started' => [
					'required' => 'Date started is required.'
				]
			];

			if (!$this->validate($rules,$errors)) {

				return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
				
			}else{

				$subscriber = new SubscriberModel();
				$account = new AccountModel();
				$payment = new PaymentModel();
				
				$new_subs = [
					'name' => $this->request->getVar('name'),
					'phone' => $this->request->getVar('phone'),
					'email' => $this->request->getVar('email'),
					'fb_name' => $this->request->getVar('fb_name'),
					'fb_url' => $this->request->getVar('fb_url'),
					'recommended_by' => $this->request->getVar('recommended_by'),
					'street' => $this->request->getVar('street'),
					'city' => $this->request->getVar('city'),
					'province' => $this->request->getVar('province'),
				];

				$insert = $subscriber->save($new_subs);
				$subs_id = $subscriber->insertID;

				if($insert){

					$new_acc = [
						'subscriber_id' => $subs_id,
						'account_name' => $this->request->getVar('account_name'),
						'area_coverage' => $this->request->getVar('area_coverage'),
						'google_coordinate' => $this->request->getVar('google_coor'),
						'antenna_model' => $this->request->getVar('antenna'),
						'date_started' => $this->request->getVar('date_started'),
						'due_date' => $this->request->getVar('due_date'),
						'schedule' => date('d', strtotime($this->request->getVar('due_date'))),
						'subs_option' => $this->request->getVar('options'),
						'monthly' => $this->request->getVar('monthly'),
						'device_user' => $this->request->getVar('device_user'),
						'b_affiliates' => $this->request->getVar('business_aff'),
						'speed' => $this->request->getVar('speed'),
					];

					$account->save($new_acc);
					$acc_id = $account->insertID;

					$p_acc = [
						'account_id' => $acc_id,
						'due_date' => $this->request->getVar('due_date'),
					];

					$payment->save($p_acc);

					return redirect()->back()->with('message', 'New subscriber has been added!');
				}

				return redirect()->back()->withInput()->with('error', 'Adding new subscriber is not successfull. Please review and try again!');
				
			}
		}
		return redirect()->back()->withInput()->with('error', 'Submitted form is now allowed!');
	}

	public function update()
	{
		if ($this->request->getMethod() == 'post') {

			$id = $this->request->getVar('id');

			$rules = [
				'name'  	=> 'required',
				'phone' 	=> 'required',
				'email' 	=> 'required|valid_email|is_unique[subscribers.email, id,'.$id.']',
				'fb_name' 	=> 'required',
				'fb_url' 	=> 'required|valid_url',
				'street' 	=> 'required',
				'city' 	=> 'required',
				'province' 	=> 'required',
				'account_name' 	=> 'required',
				'area_coverage' 	=> 'required',
				'options' 	=> 'required',
				'monthly' 	=> 'required',
				'device_user' 	=> 'required',
				'business_aff' 	=> 'required',
				'speed' 	=> 'required',
				'date_started' => 'required'
			];
			$errors = [
				'fb_name' 	=> [
					'required' => 'Subscriber facebook name is required.'
				],
				'fb_url' 	=> [
					'required' => 'Facebook URL is required.',
					'valid_url' => 'Facebook URL is invalid.',
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
				'date_started' => [
					'required' => 'Date started is required.'
				]
			];

			if (!$this->validate($rules,$errors)) {

				return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
				
			}else{

				$subscriber = new SubscriberModel();
				$account = new AccountModel();
				$payment = new PaymentModel();
				
				$subs = [
					'id' => $id,
					'name' => $this->request->getVar('name'),
					'phone' => $this->request->getVar('phone'),
					'email' => $this->request->getVar('email'),
					'fb_name' => $this->request->getVar('fb_name'),
					'fb_url' => $this->request->getVar('fb_url'),
					'recommended_by' => $this->request->getVar('recommended_by'),
					'street' => $this->request->getVar('street'),
					'city' => $this->request->getVar('city'),
					'province' => $this->request->getVar('province'),
					'updated_at' => date('y-n-j G:i:s')
				];

				$update = $subscriber->save($subs);

				if($update){

					$acc = [
						'id' => $this->request->getVar('acc_id'),
						'account_name' => $this->request->getVar('account_name'),
						'area_coverage' => $this->request->getVar('area_coverage'),
						'google_coordinate' => $this->request->getVar('google_coor'),
						'antenna_model' => $this->request->getVar('antenna'),
						'date_started' => $this->request->getVar('date_started'),
						'due_date' => $this->request->getVar('due_date'),
						'schedule' => date('d', strtotime($this->request->getVar('due_date'))),
						'subs_option' => $this->request->getVar('options'),
						'monthly' => $this->request->getVar('monthly'),
						'device_user' => $this->request->getVar('device_user'),
						'b_affiliates' => $this->request->getVar('business_aff'),
						'speed' => $this->request->getVar('speed'),
						'updated_at' => date('y-n-j G:i:s')
					];

					$account->save($acc);

					$p_acc = [
						'due_date' => $this->request->getVar('due_date'),
					];

					$addp = $payment->set($p_acc)->where('account_id', $this->request->getVar('acc_id'))->update();

					return redirect()->back()->with('message', 'Subscriber has been updated!');
				}
				return redirect()->back()->withInput()->with('error', 'Updating subscriber is not successfull. Please review and try again!');
				
			}
		}
		return redirect()->back()->withInput()->with('error', 'Submitted form is now allowed!');
	}

	

	public function delete($id)
	{
		$subsModel = new SubscriberModel();
		$accModel = new AccountModel();
		if($id) {
			$delete = $subsModel->delete($id);
			if($delete){
				$accModel->where('subscriber_id',$id)->delete();
				return redirect()->back()->withInput()->with('error', 'Subscribers has been deleted!');
			}
		}
	}

	public function changeStatus()
	{
		$validator = array('success' => false);

		if ($this->request->getMethod() == 'post') {
			$subsModel = new SubscriberModel();
			$accModel = new AccountModel();

			$status = $this->request->getVar('status');
			$id = $this->request->getVar('id');

			$data = [
				'id' => $id,
				'status' => $status,
				'updated_at' => date('y-n-j G:i:s')
			];

			$update = $subsModel->save($data);

			if($update){
				$acc = [
					'status' => $status,
					'updated_at' => date('y-n-j G:i:s')
				];
				$accModel->set($acc)->where('subscriber_id',$id)->update();

				$validator['success'] = true;
			}
		}

		echo json_encode($validator);
		
	}

}
