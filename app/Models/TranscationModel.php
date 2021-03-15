<?php namespace App\Models;

use CodeIgniter\Model;

class TranscationModel extends Model{

    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','account_id','description','notes','p_date','updated_at'];
    protected $deletedField  = 'deleted_at';

}
