<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\SubscriberModel;
use App\Models\PaymentModel;
use CodeIgniter\I18n\Time;

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

	public function import()
	{
		// Validation
		$input = $this->validate(['importFile' => 'ext_in[importFile,csv,xlsx],']);
   
		 if (!$input) {
   
			return redirect()->back()->withInput()->with('error', 'Invalid file!'); 
			
		 }else{ 
   
			if($file = $this->request->getFile('importFile')) {
			   	if ($file->isValid() && ! $file->hasMoved()) {
   
					// Get random file name
					$newName = $file->getRandomName();
	
					// Store file in public/csvfile/ folder
					$file->move('../public/csvfile', $newName);
	
					// Reading file
					$file = fopen("../public/csvfile/".$newName,"r");
					$i = 0;
	
					$importSubs = array();
	
					// Initialize $importData_arr Array
					while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
	
						// Skip first row & check number of fields
						if($i > 0){ 
							
							// Key names are the insert table field names - name, email, city, and status
							$importSubs[$i]['name'] = $filedata[0];
							$importSubs[$i]['phone'] = $filedata[1];
							$importSubs[$i]['email'] = $filedata[2];
							$importSubs[$i]['fb_name'] = $filedata[3];
							$importSubs[$i]['fb_url'] = $filedata[4];
							$importSubs[$i]['recommended_by'] = $filedata[5];
							$importSubs[$i]['street'] = $filedata[6];
							$importSubs[$i]['city'] = $filedata[7];
							$importSubs[$i]['province'] = $filedata[8];
							$importSubs[$i]['account_name'] = $filedata[9];
							$importSubs[$i]['area'] = $filedata[10];
							$importSubs[$i]['google'] = $filedata[11];
							$importSubs[$i]['model'] = $filedata[12];
							$importSubs[$i]['datestarted'] = $filedata[13];
							$importSubs[$i]['duedate'] = $filedata[14];
							$importSubs[$i]['option'] = $filedata[15];
							$importSubs[$i]['monthly'] = $filedata[16];
							$importSubs[$i]['device'] = $filedata[17];
							$importSubs[$i]['affiliates'] = $filedata[18];
							$importSubs[$i]['speed'] = $filedata[19];
						}
	
						$i++;
	
					}
					fclose($file);
	
					// Insert data
					$count = 0;
					foreach($importSubs as $data){

						$subscriber = new SubscriberModel();
						$account = new AccountModel();
						$payment = new PaymentModel();
						
						$subs = array(
							'name' => $data['name'],
							'phone' => $data['phone'],
							'email' => $data['email'],
							'fb_name' => $data['fb_name'],
							'fb_url' => $data['fb_url'],
							'recommended_by' => $data['recommended_by'],
							'street' => $data['street'],
							'city' => $data['city'],
							'province' => $data['province'],
						);
						
						$insert = $subscriber->save($subs);
						$subs_id = $subscriber->insertID;

						$started = Time::createFromFormat('m-d-Y', $data['datestarted']);
						$due = Time::createFromFormat('m-d-Y', $data['duedate']);

						$acc = array(
							'subscriber_id' => $subs_id,
							'account_name' => $data['account_name'],
							'area_coverage' => $data['area'],
							'google_coordinate' => $data['google'],
							'antenna_model' => $data['model'],
							'date_started' => $started->format('m/d/Y'),
							'due_date' => $due->format('m/d/Y'),
							'schedule' => date('d', strtotime( $due->format('m/d/Y'))),
							'subs_option' => $data['option'],
							'monthly' => $data['monthly'],
							'device_user' => $data['device'],
							'b_affiliates' => $data['affiliates'],
							'speed' => $data['speed']

						);

						$account->save($acc);
						$acc_id = $account->insertID;

						$p_acc = [
							'account_id' => $acc_id,
							'due_date' => $due->format('m/d/Y')
						];

						$payment->save($p_acc);
						$count++;

				  	}

				  	return redirect()->back()->with('message', $count.' Record inserted successfully!');
   
			   	}else{
					return redirect()->back()->withInput()->with('error', 'File not imported1!');
			   	}

			}else{
				return redirect()->back()->withInput()->with('error', 'File not imported!');
			}
   
		}
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
				'account_name' 	=> 'required',
			];
			$errors = [
				'name' 	=> [
					'required' => 'Subscribers name is required.'
				],
				'phone' 	=> [
					'required' => 'Subscribers phone number is required.',
				],
				'account_name' 	=> [
					'required' => 'Account name is required.',
				],
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

				$monthly = $this->request->getVar('monthly');

				if($monthly == 'other'){
					$monthly = $this->request->getVar('custom');
				}
				if($monthly == 'other1'){
					$monthly = $this->request->getVar('custom1');
				}
				if($monthly == 'other2'){
					$monthly = $this->request->getVar('custom2');
				}

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
						'monthly' => $monthly,
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
				'email' 	=> 'required|valid_email|is_unique[subscribers.email]',
				'account_name' 	=> 'required',
			];
			$errors = [
				'name' 	=> [
					'required' => 'Subscribers name is required.'
				],
				'phone' 	=> [
					'required' => 'Subscribers phone number is required.',
				],
				'email' 	=> [
					'required' => 'Subscribers email address is required.',
					'valid_email' => 'Subscribers email address is invalid!',
					'is_unique' => 'Email address is already in used!',
				],
				'account_name' 	=> [
					'required' => 'Account name is required.',
				],
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
