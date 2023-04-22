<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Category_model;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
class Category extends Controller {


    use ResponseTrait;

    public function index() {
        echo view('category_view');
    }

    public function save() {
        $model=new Category_model();

        $category_name =  $this->request->getVar('category_name');
        $data = $model->where('category_name', $category_name)->find();
        if(sizeof($data) == 0){
            $data = [
                'category_name' => $this->request->getVar('category_name')
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
        } else {
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Already Configured for this Category'
                ]
            ];
            return $this->respondCreated($response);
       }
    }

    public function getAllData() {
        $model=new Category_model();

        $paginationData = file_get_contents('php://input');
        $paginationJson = json_decode($paginationData, true);
        $limit = $paginationJson['limit'];
        $offset = $paginationJson['offset'];
        $search = $paginationJson['search'];
   
        $count = $model->findAll();
        $data = $model->like('category_name', $search)->orderby('category_name','asc')->limit($limit, $offset)->find();
        echo json_encode(array(
            "name" => "result",
            "total" => (int)count($count),
            "rows" => $data
        ));
    }

     // update category
     public function update()
     {
         $model = new Category_model();
         $category_name =  $this->request->getVar('category_name');
         $data = $model->where('category_name', $category_name)->find();
         if(sizeof($data) == 0){
            $data = [
                'category_name' => $this->request->getVar('category_name')
            ];
            $id = $this->request->getVar('category_id');
            $model->update($id, $data);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Updated'
                ]
            ];
            return $this->respondCreated($response);
        } else {
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Already Configured for this Category'
                ]
            ];
            return $this->respondCreated($response);
       }
     }

     // delete exam
     public function delete()
     {
        $model = new Category_model();
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

}