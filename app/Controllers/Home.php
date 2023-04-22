<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\News_model;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
class Home extends Controller {

    use ResponseTrait;

    public function index() {
        echo view('home_view');
    }

    public function getAllData() {
        $model=new News_model();
        $db = \Config\Database::connect();
        //breaking news
        $sql = "SELECT * FROM news as cs WHERE category_id = 1 AND established_date <= NOW() AND status = 'true'
                ORDER BY created_on DESC LIMIT 5 OFFSET 0";
        $query = $db->query($sql);
        $data_breakingnews = $query->getResultArray();

        //science
        $sql = "SELECT * FROM news as cs WHERE category_id = 2 AND established_date <= NOW() AND status = 'true'
        ORDER BY created_on DESC LIMIT 5 OFFSET 0";
        $query = $db->query($sql);
        $data_science = $query->getResultArray();

        //society
        $sql = "SELECT * FROM news as cs WHERE category_id = 3 AND established_date <= NOW() AND status = 'true'
        ORDER BY created_on DESC LIMIT 5 OFFSET 0";
        $query = $db->query($sql);
        $data_society = $query->getResultArray();
       
        //education
        $sql = "SELECT * FROM news as cs WHERE category_id = 4 AND established_date <= NOW() AND status = 'true'
        ORDER BY created_on DESC LIMIT 5 OFFSET 0";
        $query = $db->query($sql);
        $data_education = $query->getResultArray();

        //article
        $sql = "SELECT * FROM news as cs WHERE category_id = 5 AND established_date <= NOW() AND status = 'true'
        ORDER BY created_on DESC LIMIT 5 OFFSET 0";
        $query = $db->query($sql);
        $data_article = $query->getResultArray();

        //interview
        $sql = "SELECT * FROM news as cs WHERE category_id = 6 AND established_date <= NOW() AND status = 'true'
        ORDER BY created_on DESC LIMIT 5 OFFSET 0";
        $query = $db->query($sql);
        $data_interview = $query->getResultArray();

//kalvi
$sql = "SELECT * FROM news as cs WHERE category_id = 13 AND established_date <= NOW() AND status = 'true'
ORDER BY created_on DESC LIMIT 5 OFFSET 0";
$query = $db->query($sql);
$data_kalvi = $query->getResultArray();
       
//tamilnadu
$sql = "SELECT * FROM news as cs WHERE category_id = 7 AND established_date <= NOW() AND status = 'true'
ORDER BY created_on DESC LIMIT 5 OFFSET 0";
$query = $db->query($sql);
$data_tamilnadu = $query->getResultArray();
      
//technology
$sql = "SELECT * FROM news as cs WHERE category_id = 9 AND established_date <= NOW() AND status = 'true'
ORDER BY created_on DESC LIMIT 5 OFFSET 0";
$query = $db->query($sql);
$data_technology = $query->getResultArray();
       
//sports
$sql = "SELECT * FROM news as cs WHERE category_id = 8 AND established_date <= NOW() AND status = 'true'
ORDER BY created_on DESC LIMIT 5 OFFSET 0";
$query = $db->query($sql);
$data_sports = $query->getResultArray();
      
//thr
$sql = "SELECT * FROM news as cs WHERE category_id = 14 AND established_date <= NOW() AND status = 'true'
ORDER BY created_on DESC LIMIT 5 OFFSET 0";
$query = $db->query($sql);
$data_thr = $query->getResultArray();
      
//gallery = child
$sql = "SELECT * FROM news as cs WHERE category_id = 10 AND established_date <= NOW() AND status = 'true'
ORDER BY created_on DESC LIMIT 5 OFFSET 0";
$query = $db->query($sql);
$data_gallery = $query->getResultArray();
       
//trending_weekly
$sql = "SELECT * FROM news as cs WHERE category_id = 17 AND established_date <= NOW() AND status = 'true'
ORDER BY created_on DESC LIMIT 5 OFFSET 0";
$query = $db->query($sql);
$trending_weekly = $query->getResultArray();
       
        echo json_encode(array(
            "rows_breakingnews" => $data_breakingnews,
            "rows_science" => $data_science,
            "rows_soceity" => $data_society,
            "rows_education" => $data_education,
            "row_article" => $data_article,
            "row_interview" => $data_interview,
            "row_kalvi" => $data_kalvi,
            "row_tamilnadu" => $data_tamilnadu,
            "row_technology" => $data_technology,
            "row_sports" => $data_sports,
            "row_thr" => $data_thr,
            "row_gallery" => $data_gallery,
            "row_trending_weekly" => $trending_weekly,
        ));
    }

    public function save() {
        $db = \Config\Database::connect();
        $db->transBegin();
        $model=new News_model();
        $data = [
            'exam_name' => $this->request->getVar('exam_name')
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
        $model = new News_model();
        $data = [
            'exam_name' => $this->request->getVar('exam_name')
        ];
        $id = $this->request->getVar('exam_id');
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
        $model = new News_model();
        $id = $this->request->getVar('exam_id');
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