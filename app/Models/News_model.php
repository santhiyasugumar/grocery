<?php namespace App\Models;

use CodeIgniter\Model;

class News_model extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category_id','content', 'cover_image_type','cover_title','status',
    'updated_by', 'created_by', 'image_name','image_type','created_on','updated_on','category_id',
    'cover_image_name', 'grpid', 'established_date'];
    protected $useAutoIncrement     = true;
}


