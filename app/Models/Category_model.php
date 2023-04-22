<?php namespace App\Models;

use CodeIgniter\Model;

class Category_model extends Model
{
   
    protected $table = 'category';
    protected $primaryKey = 'category_id';
    protected $allowedFields = ['category_name'];
    protected $useAutoIncrement     = true;
}

