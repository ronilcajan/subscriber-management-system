<?php namespace App\Models;

use CodeIgniter\Model;
use Myth\Auth\Models\UserModel;

class ProfileModel extends Model{

    protected $table = 'user_profile';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id','user_id','name','address','phone','img','updated_at'];
    protected $deletedField  = 'deleted_at';


    public function getAllUsers(){

        $users = new UserModel();
        return $users->select('users.id as id, user_profile.name as fullname, img, phone, username, users.email as email, address, auth_groups.name as role, auth_groups_users.group_id as role_id')
            ->join('user_profile', 'users.id=user_profile.user_id')
            ->join('auth_groups_users', 'auth_groups_users.user_id=users.id')
            ->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id')
            ->whereNotIn('users.id',[user_id()])
            ->findAll();
            
    }
}
