<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\News_model;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
class Newsview extends BaseController {

    use ResponseTrait;

    public function index() {
        echo view('newsview_view');
    }

    public function news( $pid = NULL ) {
        $model = new News_model();
        $data['pid_data'] = $model->where("id", $pid)->orderby('created_on','desc')->limit(5, 0)->find();//1
        $data['pid_data_title'] = str_replace("'","\"",$data['pid_data'][0]['cover_title']);
        $data['pid_data_title'] = str_replace("‛","\"",$data['pid_data_title']);
        $data['pid_data_title'] = str_replace("’","\"",$data['pid_data_title']);
        $data['pid_data_title'] = str_replace("...","",$data['pid_data_title']);
        $data['pid_data_title'] = str_replace(".","",$data['pid_data_title']);
        
        $data['pid_data_img'] = $data['pid_data'][0]['id'].'/'.$data['pid_data'][0]['cover_image_name'];
        $config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
        $config['base_url'] .= "://".$_SERVER['HTTP_HOST'];
        $config['base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
        $data['descr'] = str_replace("'","\"",substr($data['pid_data'][0]['content'],0, 250));
        $data['imgsrc'] =  $config['base_url'].'uploads/'.$data['pid_data'][0]['grpid'].'/'.$data['pid_data'][0]['cover_image_name'];
        $data['dataurl'] = $config['base_url'].'Newsview/news/'.$pid;
        return view('newsview_view', $data);
    }

    public function getAllData() {
        $model=new News_model();
        $builder=$model->db->table("news as cs");
        $builder->select('cs.*');
        $builder->where("cs.category_id", 4);
        $builder->where("cs.established_date  <=", 'NOW()');
        $builder->where("cs.status", "true")->orderby('created_on','desc')->limit(5, 0);
        $pid_data = $builder->get()->getResult();
        echo json_encode(array(
            "rows_breakingnews" => $data_breakingnews
        ));
    }

    public function save() {
      
    }

    // update exam
    public function update() {
       
    }

    // delete exam
    public function delete() {
       
    }

}