<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Subcategory_model;
use App\Models\Category_model;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
class Subcategory extends Controller {
    use ResponseTrait;

    public function index() {
        echo view('subcategory_view');
    }

    public function save() {
        $model=new Subcategory_model();

        $subcategoryname =  $this->request->getVar('subcategoryname');
        $data = [
            'subcategoryname' => $this->request->getVar('subcategoryname'),
            'category_id' =>  $this->request->getVar('drpCategory')
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function getAllData() {
        $model=new Subcategory_model();
        $db = \Config\Database::connect();
        $paginationData = file_get_contents('php://input');
        $paginationJson = json_decode($paginationData, true);
        $limit = $paginationJson['limit'];
        $offset = $paginationJson['offset'];
        $search = $paginationJson['search'];
   
        $count = $model->findAll();
        $data = $model->like('subcategoryname', $search)->orderby('subcategoryname','asc')->limit($limit, $offset)->find();
        $query = "SELECT a.subcategoryname,a.id, a.category_id, b.category_name FROM subcategory a inner join category b on a.category_id = b.category_id";
        $query = $db->query($query);
        $val = $query->getResultArray(); 

        echo json_encode(array(
            "name" => "result",
            "total" => (int)count($count),
            "rows" => $val
        ));
    }

     // update category
     public function update()
     {
        $model = new Subcategory_model();
        $subcategoryname =  $this->request->getVar('subcategoryname');
        $data = $model->where('subcategoryname', $subcategoryname)->find();
        $data = [
            'subcategoryname' => $this->request->getVar('subcategoryname'),
            'category_id' =>  $this->request->getVar('drpCategory')
        ];
        $id = $this->request->getVar('sub_category_id');
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respondCreated($response);
     }

     // delete exam
     public function delete()
     {
        $model = new Subcategory_model();
        $id = $this->request->getVar('category_id');
        $model->delete($id);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Deleted'
            ]
        ];
        return $this->respondCreated($response);
     }

     public function getSubCategoryById() {
        $db = \Config\Database::connect();
        $model = new Category_model();
        
        $category_id = $this->request->getVar('drpCategory')[0];
        $query = "SELECT id, subcategoryname from subcategory where category_id = $category_id";
        $query = $db->query($query);
        $val = $query->getResultArray(); 

        $data_category = array();
        $row =  array();
        foreach($val as $user){
            $row["id"] =$user['id'];
            $row["text"] = $user['subcategoryname'];
            array_push($data_category, $row);
        }

        $response  = json_encode(array(
            "DATA_SUBCATEGORY" => $data_category,
        ));
        
        return $this->respondCreated($response);
     }

}