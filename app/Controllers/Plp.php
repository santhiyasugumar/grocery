<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\News_model;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
class Plp extends Controller {

    use ResponseTrait;

    public function index() {
        return view('plp_final_view');
    }

    public function getProductBasedonCategoryId()
	{
        $data = $this->request->getPost();
        $txtsearch =  $data['txtsearch'];
        
        $db = \Config\Database::connect();
        helper('url');
       
        $category_id = $data['category_id'];
        $category_type = $data['category_type'];
        $offset = $data['offset'];
      
        if($category_type == "sc") {
            $getfrom = "where subcategory_id = $category_id ";
        } else if($category_type == "c") {
            $getfrom = "where category_id = $category_id";
        }

        if(!empty($txtsearch)) {
            $getfrom .= "AND product_name like '%$txtsearch%'  ";
        } else  {
            $getfrom .=  "limit 10 offset $offset";
        }

        $query_str = "SELECT * from product $getfrom";
        $query = $db->query($query_str);
        $val = $query->getResultArray(); 
        
        $val = array(
            "name" => "result",
            "rows" => $val,
            "query" => $query_str
        );

		return json_encode($val);
	}
}