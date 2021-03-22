<?php namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model{

    protected $table = 'accounts';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','subscriber_id','account_name','area_coverage','google_coordinate','antenna_model','date_started','due_date','schedule',
                                'subs_option','monthly','device_user','b_affiliates','speed','status','updated_at'];
    protected $deletedField  = 'deleted_at';

    protected $afterInsert = ['insertActivity'];
    protected $afterUpdate = ['insert_updateActivity'];
    protected $afterDelete = ['insert_deleteActivity'];

    protected function insertActivity(array $data){

        if(!isset($data['data']['account_name'])){
            return $data;
        }else{
            $db = db_connect();

            $id = user_id();
            $events = 'Account Name:' .$data['data']['account_name'].' has been created.';
            $type = 'New Account';
            $query = $db->query("INSERT INTO activity_log (events,activity_type,`user_id`) VALUES('$events','$type', $id)");
            return $data;
        }

        
    }

    protected function insert_updateActivity(array $data){

        if(!isset($data['data']['account_name'])){
            return $data;
        }else{

            $db = db_connect();

            $id = user_id();
            $events = 'Account Name: ' .$data['data']['account_name'].' has been updated!';
            $type = 'Account Update';
            $query = $db->query("INSERT INTO activity_log (events,activity_type,`user_id`) VALUES('$events','$type', $id)");
            return $data;
        }
    }

    protected function insert_deleteActivity(array $data){

        $db = db_connect();

        $id = user_id();
        $events = 'Account ID: ' .$data['id'].' has been deleted!';
        $type = 'Delete Account';
        $query = $db->query("INSERT INTO activity_log (events,activity_type,`user_id`) VALUES('$events','$type', $id)");
        return $data;
    }

}
