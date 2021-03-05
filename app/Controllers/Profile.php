<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use Myth\Auth\Models\UserModel;

class Profile extends BaseController
{
	public function index()
	{
        $user = new ProfileModel();
		$data['user'] = $user->select('user_profile.id as id, username, user_id,name,users.email,phone,address,img, active')
							->join('users','user_profile.user_id = users.id')
							->where('user_id', user_id())
							->first();

		$data['title'] = "My Profile";
		return view('profile',$data);
	}

	public function update()
	{
		if ($this->request->getMethod() == 'post') {
            $id = user_id();

			$rules = [
				'avatar' => 'is_image[avatar]',
				'username' => 'required|alpha_numeric_space|min_length[3]|is_unique[users.username,id,'.$id.']',
				'name' 	=> 'required|alpha_numeric_space|min_length[3]',
				'email'	=> 'required|valid_email|is_unique[users.email,id,'.$id.']',
				'phone' => 'required|alpha_numeric_space|min_length[3]',
				'address' => 'required|alpha_numeric_space|min_length[3]',
			];

			if (!$this->validate($rules)) {

				return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

			}else{

				$img = $this->request->getFile('avatar');

				if($img->isValid()){
					if($img->isValid()){
						$newAvatarName = $img->getRandomName();
						$img->move('uploads', $newAvatarName);
						
						if($img->hasMoved()){
							$user_profile = [
								'name' => $this->request->getVar('name'),
								'address' => $this->request->getVar('address'),
								'img' => $newAvatarName,
								'updated_at' => date('y-n-j G:i:s')
							];
						}
                    }
				}else{
					$user_profile = [
						'name' => $this->request->getVar('name'),
						'phone' => $this->request->getVar('phone'),
						'address' => $this->request->getVar('address'),
						'updated_at' => date('y-n-j G:i:s')
					];
				}

				$db = db_connect();
				$email =  $this->request->getVar('email');
				$username = $this->request->getVar('username');

				$db->query("UPDATE users SET email='$email', username='$username' WHERE id=$id");

				$profile = new ProfileModel();

				$update = $profile->whereIn('user_id', [$id])->set($user_profile)->update();

				return redirect()->back()->with('message', 'Profile has been updated!');
			}
		}
		return redirect()->to(previous_url());
	}

	public function changepass(){

		if ($this->request->getMethod() == 'post') {
            $id = user_id();

			$users = model(UserModel::class);

            $rules = [
				'email' => 'required|valid_email',
                'new_pass' => 'required|min_length[8]|strong_password',
                'conf_pass' => 'required|min_length[8]|strong_password|matches[new_pass]',
			];

            $errors = [
                'conf_pass' => [
                    'matches' => 'Password did not match!',
                    'min_length' => 'Confirm password field must be at least 8 characters in length.'
                ],
                'new_pass' => [
                    'matches' => 'Password did not match!',
                    'min_length' => 'New password field must be at least 8 characters in length.'
                ]
            ];

            if (!$this->validate($rules,$errors)) {

				return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
				
			}else{

				$user = $users->where('email', $this->request->getPost('email'))
					  ->first();

				if (is_null($user))
				{
					return redirect()->back()->with('error', lang('Auth.forgotNoUser'));
				}

                $user->password 		= $this->request->getPost('conf_pass');
				$user->reset_hash 		= null;
				$user->reset_at 		= date('Y-m-d H:i:s');
				$user->reset_expires    = null;
				$user->force_pass_reset = false;
				$users->save($user);

				return redirect()->back()->with('message', 'Password has been changed!');
            }
        }
		return redirect()->back()->with('error', 'Something went wrong!');
    }
}
