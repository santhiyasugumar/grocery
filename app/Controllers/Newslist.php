<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\News_model;
use App\Models\Category_model;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
class Newslist extends Controller {

    use ResponseTrait;
  
    public function index() {
        echo view('newslist_view');
    }

    public function list( $pid = NULL ) {
        echo view('newslist_view');
    }

    public function getAllData() {
        $db = \Config\Database::connect();
        try
        {
            $model=new News_model();
          
            $paginationData = file_get_contents('php://input');
            $paginationJson = json_decode($paginationData, true);
            $limit = $paginationJson['limit'];
            $offset = $paginationJson['offset'];
            $search = $paginationJson['search'];
            $category_id  = $paginationJson['category_id'];

            // $count = $model->where("category_id", $category_id)->like('content', $search)->like('cover_title', $search)->orderby('created_on','desc')->findAll();
            // $data =  $model->where("category_id", $category_id)->like('content', $search)->like('cover_title', $search)->orderby('created_on','desc')->limit($limit, $offset)->find();

            $sql = "SELECT *,DATE_FORMAT(created_on, '%d/%m/%Y') as created_on_date FROM news AS news 
            WHERE category_id = $category_id AND
            established_date <= NOW() AND 
            ((content LIKE '%$search%') OR (cover_title LIKE '%$search%') )
            ORDER BY created_on DESC";
            $query = $db->query($sql);
            $count  = $query->getResultArray(); 
            

            $sql = "SELECT *, DATE_FORMAT(created_on, '%d/%m/%Y') as created_on_date FROM news AS news 
            WHERE category_id = $category_id AND
            established_date <= NOW() AND 
            ((content LIKE '%$search%') OR (cover_title LIKE '%$search%') )
            ORDER BY created_on DESC LIMIT $limit OFFSET $offset";
            $query = $db->query($sql);
            $data = $query->getResultArray(); 
            
            echo json_encode(array(
                "name" => "result",
                "total" => (int)count($count),
                "rows" => $data
            ));
        }
        catch (\Exception $e)
        {
            die($e->getMessage());
        }
        
    }

    public function getPageData() {
        $db = \Config\Database::connect();
        $category_id = json_decode(file_get_contents('php://input'), true);
        $model=new News_model();

        $sql = "SELECT *,DATE_FORMAT(created_on, '%d/%m/%Y') as created_on_date FROM news AS news 
                WHERE category_id = 1 AND
                established_date <= NOW() AND status = 'true'
                ORDER BY created_on DESC LIMIT 10 OFFSET 0";
        $query = $db->query($sql);
        $category_data_tn  = $query->getResultArray(); 

        $sql = "SELECT *,DATE_FORMAT(created_on, '%d/%m/%Y') as created_on_date FROM news AS news 
        WHERE category_id = 2 AND
        established_date <= NOW() AND status = 'true'
        ORDER BY created_on DESC LIMIT 10 OFFSET 0";
        $query = $db->query($sql);
        $category_data_g  = $query->getResultArray(); 

        $sql = "SELECT *,DATE_FORMAT(created_on, '%d/%m/%Y') as created_on_date FROM news AS news 
        WHERE category_id = 3 AND
        established_date <= NOW() AND status = 'true'
        ORDER BY created_on DESC LIMIT 10 OFFSET 0";
        $query = $db->query($sql);
        $category_data_tv  = $query->getResultArray(); 

        $sql = "SELECT *,DATE_FORMAT(created_on, '%d/%m/%Y') as created_on_date FROM news AS news 
        WHERE category_id = 4 AND
        established_date <= NOW() AND status = 'true'
        ORDER BY created_on DESC LIMIT 10 OFFSET 0";
        $query = $db->query($sql);
        $category_data_tv  = $query->getResultArray(); 

    
        $model_category=new Category_model();
        $category_name = $model_category->where("category_id",$category_id)->find();

        echo json_encode(array(
            "row_thiraivimarsanam" => $category_data_tv,
            "rows_category" => $category_name,
            "rows_trending_news" => $category_data_tn,
            "rows_gallery" => $category_data_g
        ));
    }

    public function save() {
      
    }

    // update exam
    public function update() {
       
    }

     // delete exam
     public function delete(){
       
     }

    
}