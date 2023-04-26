<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product_model;
use App\Models\City_model;
use App\Models\Category_model;
use App\Models\Class_section_model;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
class Product extends Controller {

    use ResponseTrait;

    public function index() {
        echo view('product_view');
    }

    public function getAllData() {
        helper(['form', 'url']);
      
        $db = \Config\Database::connect();
        $model=new Product_model();
        $model_category = new Category_model();

        $paginationData = file_get_contents('php://input');
        $paginationJson = json_decode($paginationData, true);
        $limit = $paginationJson['limit'];
        $offset = $paginationJson['offset'];
        $search = $paginationJson['search'];
        $sea = "";
        if(!isset($search)) {
            $sea = "AND (news.cover_title LIKE '%$search%') OR (cat.category_name LIKE '%$search%')";
        }

        $sql = "SELECT news.*,GROUP_CONCAT(news.category_id) as category_id_group,cat.category_name as category_name,GROUP_CONCAT(cat.category_name) as category_name, DATE_FORMAT(news.created_on, '%d/%m/%Y') as created_on FROM news AS news 
        LEFT JOIN category AS cat ON cat.category_id = news.category_id
        WHERE 
        news.established_date <= NOW() $sea 
        GROUP BY news.grpid ORDER BY news.created_on DESC";
        echo ($sql);
        exit;
        $query = $db->query($sql);
        $count = $query->getResultArray(); 
       
        $sql = "SELECT news.*,GROUP_CONCAT(news.category_id) as category_id_group,cat.category_name as category_name,GROUP_CONCAT(cat.category_name) as category_name, DATE_FORMAT(news.created_on, '%d/%m/%Y') as created_on FROM news AS news 
        LEFT JOIN category AS cat ON cat.category_id = news.category_id
        WHERE 
        news.established_date <= NOW() $sea 
        GROUP BY news.grpid ORDER BY news.created_on DESC LIMIT $limit OFFSET $offset";
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
        helper(['form', 'url']);
        $model=new Product_model();
 
        $msg = 'Please select a valid file';
        $cat_arr =  $this->request->getVar('drpCategory');
        $sub_cat_arr =  $this->request->getVar('drpSubCategory');
        
        $avatar = $this->request->getFile('file');
        if($this->request->getVar('inlineRadioOptions') == "public") {
            $status = 'true';
        } else if($this->request->getVar('inlineRadioOptions') == "private") {
            $status = 'false';
        }
       
        // for($i = 0; $i<sizeof($cat_arr); $i++) {
            $type = $avatar->getClientMimeType();
            $img=  $avatar->getClientName();
            $data = [
                'product_name' => $this->request->getVar('product_name'),
                'product_image_name' => $img,
                'product_image_type'  => $type,
                'category_id' => '7',
                'subcategory_id' => '4',
                'status' => $status,
                'created_on'=> date("Y-m-d h:i:s"),
                'created_by'=> '1',
                'updated_on'=> date("Y-m-d h:i:s"),
                'updated_by'=> '1',
            ];

            // return json_encode($data);
            $last_id = $model->insert($data);
           
            // if($i==0 && ($cat_arr[$i] != 8)) {
            //     $grpid = $last_id;
            //     $path = "uploads/". $last_id;
            //     mkdir($path);
            //     $avatar->move($path);
            // }
            // $data = [
            //     'grpid' => $grpid
            // ];
            // $model->update($last_id, $data);
        // }
        $msg = 'Data Saved';

        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => $msg
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
        $db = \Config\Database::connect();
        $db->transBegin();
        helper(['form', 'url']);
        $model=new Product_model();
        
        $avatar = $this->request->getFile('file');
        $grpid = $this->request->getVar('txtid');  
        $is_img = $this->request->getVar('is_img');
        $builder=$model->db->table("news as cs");
        $builder->select('cs.*');
        $builder->where("cs.grpid", $grpid);
        $category_data_tn = $builder->get()->getResult();
        
        for($i = 0; $i<sizeof($category_data_tn); $i++) {
            $img = $category_data_tn[$i]->cover_image_name;
            $type = $category_data_tn[$i]->cover_image_type;
            $model->delete($category_data_tn[$i]->id);
        }
       
        if($this->request->getVar('inlineRadioOptions') == "public") {
            $status = 'true';
        } else if($this->request->getVar('inlineRadioOptions') == "private") {
            $status = 'false';
        }
        $cat_arr =  $this->request->getVar('drpCategory');

        // if ($validated) {
            for($i = 0; $i<sizeof($cat_arr); $i++) {
                if($cat_arr[$i] == 8) {
                    $img = "";
                    $type = "";
                }  else if($is_img == 1){
                    $type = $avatar->getClientMimeType();
                    $img=  $avatar->getClientName();
                }
              
                $data = [
                    'content' => $this->request->getVar('content'),
                    'cover_image_name' => $img,
                    'cover_image_type'  => $type,
                    'category_id' => $cat_arr[$i],
                    'cover_title' => trim($this->request->getVar('covertitle')),
                    'status' => $status,
                    'created_on'=> date("Y-m-d h:i:s"),
                    'created_by'=> '1',
                    'updated_on'=> date("Y-m-d h:i:s"),
                    'updated_by'=> '1',
                    'grpid' => $grpid,
                    'established_date'=> $this->request->getVar('established_date'),
                ];
    
                $last_id = $model->insert($data);
             
                if(($i==0) && ($cat_arr[$i] != 8) && ($is_img != 0)) {
                    $path = "uploads/". $grpid;
                    $avatar->move($path);
                }
                $model->update($last_id, $data);
            }
            $msg = 'Data Updated';
        // } else {
        //     for($i = 0; $i<sizeof($cat_arr); $i++) {
        //         $data = [
        //             'content' => $this->request->getVar('content'),
        //             'category_id' => $cat_arr[$i],
        //             'cover_title' => trim($this->request->getVar('covertitle')),
        //             'status' => $status,
        //             'created_on'=> date("Y-m-d h:i:sa"),
        //             'created_by'=> '1',
        //             'updated_on'=> date("Y-m-d h:i:sa"),
        //             'updated_by'=> '1',
        //             'grpid' => $grpid,
        //             'cover_image_name' =>  $imgname,
        //             'cover_image_type'  => $imgtype,
        //             'established_date'=> $this->request->getVar('established_date'),
        //         ];

        //         $last_id = $model->insert($data);
        //     }
        //     $msg = 'Data Updated';
        // }

        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => $msg
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

     // delete news
     public function delete()
     {
        $db = \Config\Database::connect();
        $db->transBegin();
        $model = new Product_model();
        $grpid = $this->request->getVar('txtid_delete');

        $builder=$model->db->table("news as cs");
        $builder->select('cs.*');
        $builder->where("cs.grpid", $grpid);
        $category_data_tn = $builder->get()->getResult();
        for($j=0; $j<sizeof($category_data_tn); $j++) {
            $model->delete($category_data_tn[$j]->id);
        }
        
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Deleted'
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

     public function getData_drp()
     {
         $model = new Category_model();
         $userlist  = $model->orderBy('category_name', 'asc')->findAll();
         $data_category = array();
         $row =  array();
         foreach($userlist as $user){
             $row["id"] =$user['category_id'];
             $row["text"] = $user['category_name'];
             array_push($data_category, $row);
         }
 
         $result  = json_encode(array(
             "DATA_CATEGORY" => $data_category,
             "DATA_CITY" => '',
          ));
             
         return $result;
     }
}