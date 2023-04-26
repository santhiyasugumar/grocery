<?php namespace App\Models;

use CodeIgniter\Model;

class Magazine_model extends Model
{
   
    protected $table = 'magazine';
    protected $primaryKey = 'id';
    protected $allowedFields = ['magazineid', 'emailid', 'mobileno', 'created_by', 'updated_by', 'created_on', 'updated_on'];
    protected $useAutoIncrement     = true;
}

