<?php namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model{

    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','account_id','description','notes','status','p_date','no_months','payment','updated_at'];
    protected $deletedField  = 'deleted_at';

}
