<?php namespace App\Models;

use CodeIgniter\Model;

class SubscriberModel extends Model{

    protected $table = 'subscribers';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','name','phone','email','fb_name','fb_url','recommended_by','street','city','province','img','status','updated_at'];
    protected $deletedField  = 'deleted_at';

    protected $afterInsert = ['insertActivity'];
    protected $afterUpdate = ['insert_updateActivity'];
    protected $afterDelete = ['insert_deleteActivity'];

    protected function insertActivity(array $data){
        if(!isset($data['data']['name'])){
            return $data;
        }else{

            $db = db_connect();

            $id = user_id();
            $events = 'Subscriber Name: '.$data['data']['name'].' has been created!';
            $type = 'New Subscriber';
            $query = $db->query("INSERT INTO activity_log (events,activity_type,`user_id`) VALUES('$events','$type', $id)");
            return $data;
        }
    }

    protected function insert_updateActivity(array $data){
        if(!isset($data['data']['name'])){
            return $data;
        }else{

            $db = db_connect();

            $id = user_id();
            $events = 'Subscriber Name: '.$data['data']['name'].' has been updated!';
            $type = 'Subscriber Update';
            $query = $db->query("INSERT INTO activity_log (events,activity_type,`user_id`) VALUES('$events','$type', $id)");
            return $data;
        }
    }

    protected function insert_deleteActivity(array $id){

        $db = db_connect();

        $id = user_id();
        $events = 'Subscriber ID: '.$id.' has been deleted!';
        $type = 'Delete Subscriber';
        $query = $db->query("INSERT INTO activity_log (events,activity_type,`user_id`) VALUES('$events','$type', $id)");
        return true;
    }

}
