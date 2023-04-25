<?php namespace App\Models;

use CodeIgniter\Model;

class Subcategory_model extends Model
{
   
    protected $table = 'subcategory';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category_id', 'subcategoryname'];
    protected $useAutoIncrement     = true;
}

