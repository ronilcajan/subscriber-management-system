<?php namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model{

    protected $table = 'accounts';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','subscriber_id','account_name','area_coverage','google_coordinates','antenna_model','date_accomplished','due_date',
                                'subs_option','monthly','device_user','b_affiliates','speed','updated_at'];
    protected $deletedField  = 'deleted_at';

}
