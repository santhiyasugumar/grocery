<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Magazine_model;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
class Magazine extends Controller {

    use ResponseTrait;

    public function index() {
        echo view('magazine_view');
    }

    public function getAllData() {
        $model=new Magazine_model();
        $db = \Config\Database::connect();

        $queryvalue = explode("&",substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1));
        $search = explode("=",$queryvalue[0]);
        $search = str_replace("%20", " ", $search[1]);
        $offset = explode("=",$queryvalue[1]);
        $limit  = explode("=",$queryvalue[2]);

        $sql = "SELECT * FROM magazine WHERE mobileno LIKE '%$search%' or emailid LIKE '%$search%'";
        $query = $db->query($sql);
        $count = $query->getResultArray(); 

        $sql = "SELECT * FROM magazine WHERE mobileno LIKE '%$search%' or emailid LIKE '%$search%' limit $limit[1] offset $offset[1]";
        $query = $db->query($sql);
        $result = $query->getResultArray(); 

        echo json_encode(array(
            "name" => "result",
            "total" => (int)count($count),
            "rows" => $result
        ));
    }

    public function save() {
       
    }

     // update category
     public function update()
     {
        
     }

     // delete exam
     public function delete()
     {
     
     }

}