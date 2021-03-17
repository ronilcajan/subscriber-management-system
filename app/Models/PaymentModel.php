<?php namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model{

    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','account_id','date_paid','due_date'];
}
