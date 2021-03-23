<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\SubscriberModel;
use App\Models\TransactionModel;
use App\Models\SystemModel;

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

		$system = new SystemModel();

		$data['info'] = $system->find(1);

		$data['title'] = "System Info";
		return view('system',$data);
	}

	public function updateSystem(){
		
		if ($this->request->getMethod() == 'post') {

			$rules = [
				'name' => 'required',
				'dname' => 'required',
				'tagline' 	=> 'required',
				'email' => 'required|valid_email',
				'phone' 	=> 'required',
				'address' 	=> 'required',
			];
			$errors = [
				'name' 	=> [
					'required' => 'Business name is required.',
				],
				'dname' 	=> [
					'required' => 'Dashboard name is required.',
				],
				'tagline' 	=> [
					'required' => 'Business tagline is required.',
				],
				'email' 	=> [
					'required' => 'Business email address is required.',
				],
				'phone' 	=> [
					'required' => 'Business phonenumber is required.',
				],
				'address' 	=> [
					'required' => 'Business address is required.',
				],
			];

			if (!$this->validate($rules,$errors)) {

				return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
				
			}else{
				$system = new SystemModel();
				$icon = $this->request->getFile('icon');
				$logo = $this->request->getFile('logo');

				if($icon->isValid() && $logo->isValid()){
					$IconName = $icon->getRandomName();
					$icon->move('uploads', $IconName);

					$LogoName = $logo->getRandomName();
					$logo->move('uploads', $LogoName);

					if($icon->hasMoved() && $logo->hasMoved()){
						$newIconName = 'new-'.$IconName;
						$img = \Config\Services::image()
							->withFile('uploads/'.$IconName)
							->resize(36, 36, true, 'width')
							->save('uploads/'.$newIconName);

						$data = [
							'id' => $this->request->getVar('id'),
							'name' => $this->request->getVar('name'),
							'dname' => $this->request->getVar('dname'),
							'tagline' => $this->request->getVar('tagline'),
							'email' => $this->request->getVar('email'),
							'phone' => $this->request->getVar('phone'),
							'address' => $this->request->getVar('address'),
							'icon' => $newIconName,
							'logo' => $LogoName,
						];
						
						$update = $system->save($data);
						
						return redirect()->back()->with('message', 'System information has been updated!');
					}
				}

				if($icon->isValid() && !$logo->isValid()){
					$IconName = $icon->getRandomName();
					$icon->move('uploads', $IconName);

					if($icon->hasMoved()){
						$newIconName = 'new-'.$IconName;
						$img = \Config\Services::image()
							->withFile('uploads/'.$IconName)
							->resize(36, 36, true, 'width')
							->save('uploads/'.$newIconName);

						$data = [
							'id' => $this->request->getVar('id'),
							'name' => $this->request->getVar('name'),
							'dname' => $this->request->getVar('dname'),
							'tagline' => $this->request->getVar('tagline'),
							'email' => $this->request->getVar('email'),
							'phone' => $this->request->getVar('phone'),
							'address' => $this->request->getVar('address'),
							'icon' => $newIconName,
						];

						$update = $system->save($data);
						
						return redirect()->back()->with('message', 'System information has been updated!');
					}
				}

				if($logo->isValid() && !$icon->isValid()){
					$LogoName = $logo->getRandomName();
					$logo->move('uploads', $LogoName);

					if($logo->hasMoved()){

						$data = [
							'id' => $this->request->getVar('id'),
							'name' => $this->request->getVar('name'),
							'dname' => $this->request->getVar('dname'),
							'tagline' => $this->request->getVar('tagline'),
							'email' => $this->request->getVar('email'),
							'phone' => $this->request->getVar('phone'),
							'address' => $this->request->getVar('address'),
							'logo' => $LogoName,
						];
						$update = $system->save($data);
						
						return redirect()->back()->with('message', 'System information has been updated!');
					}
				}
				if(!$logo->isValid() && !$icon->isValid()){
					$data = [
						'id' => $this->request->getVar('id'),
						'name' => $this->request->getVar('name'),
						'dname' => $this->request->getVar('dname'),
						'tagline' => $this->request->getVar('tagline'),
						'email' => $this->request->getVar('email'),
						'phone' => $this->request->getVar('phone'),
						'address' => $this->request->getVar('address'),
					];

					$update = $system->save($data);
					
					return redirect()->back()->with('message', 'System information has been updated!');
				}

				return redirect()->back()->withInput()->with('error', 'Updating system information is not successful. Please review and try again.');
			}
		}
		return redirect()->back()->withInput()->with('error', 'Submitted form is now allowed!');
	}
}
