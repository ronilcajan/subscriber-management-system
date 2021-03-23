<?php namespace App\Models;

use CodeIgniter\Model;

class SystemModel extends Model{

    protected $table = 'system_info';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','name','dname','tagline','email','phone','address','icon','logo','updated_at'];

}
