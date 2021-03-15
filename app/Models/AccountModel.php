<?php namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model{

    protected $table = 'accounts';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','subscriber_id','account_name','area_coverage','google_coordinate','antenna_model','date_started','due_date','schedule',
                                'subs_option','monthly','device_user','b_affiliates','speed','status','updated_at'];
    protected $deletedField  = 'deleted_at';

}
