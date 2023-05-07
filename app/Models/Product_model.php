<?php namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category_id','product_name', 
    'updated_by', 'created_by', 'product_image_name','product_image_type','status','updated_on','created_on','subcategory_id', 'price'];
    protected $useAutoIncrement     = true;
}


