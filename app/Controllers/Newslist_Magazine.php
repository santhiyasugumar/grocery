<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\News_model;
use App\Models\Category_model;
use App\Models\Magazine_model;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
class Newslist_Magazine extends Controller {

    use ResponseTrait;
  
    public function index() {
        echo view('newslist_magazine_view');
    }

    public function list( $pid = NULL ) {
        echo view('newslist_magazine_view');
    }

    public function getAllData() {
        $model=new News_model();
        $db = \Config\Database::connect();
    
        $paginationData = file_get_contents('php://input');
        $paginationJson = json_decode($paginationData, true);
        $limit = $paginationJson['limit'];
        $offset = $paginationJson['offset'];
        $search = $paginationJson['search'];
        $category_id  = 7;

        // $builder=$model->db->table("news as cs");
        // $builder->where("cs.category_id", $category_id);
        // $builder->where("cs.established_date <=", 'NOW()');
        // $builder->like("cs.cover_title", $search);
        // $count = $builder->get()->getResult();
        // $builder->orderby("cs.created_on", 'desc')->limit($limit[1], $offset[1]);
        // $data = $builder->get()->getResult();

        $sql = "SELECT * FROM news WHERE category_id = $category_id AND established_date <= NOW() AND 
        cover_title LIKE '%$search%' order by created_on desc";
        $query = $db->query($sql);
        $count = $query->getResultArray(); 

        $sql = "SELECT * FROM news WHERE category_id = $category_id AND established_date <= NOW() AND 
        cover_title LIKE '%$search%' order by created_on desc limit $limit offset $offset";
        $query = $db->query($sql);
        $data = $query->getResultArray(); 
   
        echo json_encode(array(
           "name" => "result",
           "total" => (int)count($count),
           "rows" => $data
       ));
    }

    public function save() {
        $db = \Config\Database::connect();
        $db->transBegin();
        $model=new Magazine_model();
        $data = [
            'emailid' => $this->request->getVar('emailid'),
            'mobileno' => $this->request->getVar('mobileno'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        if ($db->transStatus() === FALSE)
        {
            $db->transRollback();
        }
        else
        {
            $db->transCommit();
        }
        return $this->respondCreated($response);
    }

    // update exam
    public function update()
    {
        
    }

     // delete exam
     public function delete()
     {
       
     }

    
}