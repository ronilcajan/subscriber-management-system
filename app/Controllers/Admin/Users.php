<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use \Myth\Auth\Models\UserModel;
use CodeIgniter\I18n\Time;


class Users extends BaseController
{
	public function index()
	{
		$users = new ProfileModel();
		
		$data['users'] = $users->getAllUsers();

		$data['title'] = "User Management";
		return view('admin/users/users',$data);
	}

	public function update()
	{
		if ($this->request->getMethod() == 'post') {

			$id = $this->request->getVar('id');

			$rules = [
				'username'  	=> 'required|alpha_numeric_space|min_length[3]|is_unique[users.username,id,'.$id.']',
				'role' 	=> 'required',
			];
			$errors = [
				'role' 	=> [
					'required' => 'User role is required.'
				]
			];

			if (!$this->validate($rules,$errors)) {

				return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
				
			}else{

				$db = db_connect();
				$role =  $this->request->getVar('role');
				$username = $this->request->getVar('username');

				$db->query("UPDATE users SET username='$username' WHERE id=$id");
				$db->query("UPDATE auth_groups_users SET group_id=$role WHERE user_id=$id");

				return redirect()->back()->with('message', 'User has been updated!');
				
			}
		}
		return redirect()->back()->withInput()->with('errors', 'Submitted form is now allowed!');
	}

	public function user_info($id){
		
		$user = new ProfileModel();
		$data['user'] = $user->select('user_profile.id as id, username, user_id,name,users.email,phone,address,img, active')
							->join('users','user_profile.user_id = users.id')
							->where('user_id', $id)
							->first();

		$data['title'] = "User Info";
		return view('admin/users/user_info',$data);
	}
	public function delete($id)
	{	
		$model = new UserModel();
		$profile = new ProfileModel();
		if($id) {
			$delete = $model->delete($id);
			if($delete){
				$profile->where('user_id',$id)->delete();
				$this->session->setFlashdata('error', 'User has been deleted!');
				return redirect()->to(previous_url());
			}
		}
	}

}
