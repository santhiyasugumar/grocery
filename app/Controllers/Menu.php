<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\News_model;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
class Menu extends Controller {

    use ResponseTrait;

    public function index() {
     
    }

    public function megaMenu() {
        
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM category";
        $query = $db->query($sql);
        $result_parent = $query->getResultArray();
        $menu = '<div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">';
        for($i=0; $i<count($result_parent); $i++) {
            $category_id = $result_parent[$i]['category_id'];
            $sql = "SELECT id,subcategoryname FROM subcategory WHERE category_id = $category_id";
            $query = $db->query($sql);
            $result = $query->getResultArray();
            $menu .= '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        '. $result_parent[$i]['category_name'] .'</a>
                        <ul class="dropdown-menu dropdown-menu-dark">';
            for($j=0; $j<count($result); $j++) {
                $menu .= '<li><a class="dropdown-item" href="'.base_url().'plp/sc/'. $result[$j]['id'] .'">'. $result[$j]['subcategoryname'] .'</a></li>';
                
            }
            $menu .= '</ul></li>';
        }
        $menu .= '</ul></div>';

        $data = [
            "menu" => $menu
        ];
        return json_encode($data);
    }

}