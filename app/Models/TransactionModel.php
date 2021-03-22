<?php namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model{

    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','account_id','description','notes','status','p_date','no_months','payment','updated_at'];
    protected $deletedField  = 'deleted_at';

    protected $afterInsert = ['insertActivity'];
    protected $afterUpdate = ['insert_updateActivity'];

    protected function insertActivity(array $data){

        $db = db_connect();

        $id = user_id();
        $events = 'Account ID: ['.$data['data']['account_id'].'] paid '.$data['data']['description'].' due date.';
        $type = 'New Payment';
        $query = $db->query("INSERT INTO activity_log (events,activity_type,`user_id`) VALUES('$events','$type', $id)");
        return $data;
    }

    protected function insert_updateActivity(array $data){

        $db = db_connect();

        $id = user_id();
        $events = 'Transaction ID: ['.$data['data']['id'].'] has been updated!';
        $type = 'Update Payment';
        $query = $db->query("INSERT INTO activity_log (events,activity_type,`user_id`) VALUES('$events','$type', $id)");
        return $data;
    }

}
