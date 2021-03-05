<?php namespace App\Models;

use CodeIgniter\Model;

class SubscriberModel extends Model{

    protected $table = 'subscribers';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','name','phone','email','fb_name','fb_url','recommended_by','street','city','province','img','updated_at'];
    protected $deletedField  = 'deleted_at';

}
