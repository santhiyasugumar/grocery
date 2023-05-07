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
        $menu = "";
        for($i=0; $i<count($result_parent); $i++) {
            $category_id = $result_parent[$i]['category_id'];
            $sql = "SELECT id,subcategoryname FROM subcategory WHERE category_id = $category_id";
            $query = $db->query($sql);
            $result = $query->getResultArray();
            $menu .= '<div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne'.$i.'">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne'.$i.'" aria-expanded="false" aria-controls="collapseOne">
                        '. $result_parent[$i]['category_name'] .'
                        </button>
                        </h2>
                        <div id="collapseOne'.$i.'" class="accordion-collapse collapse" aria-labelledby="headingOne'.$i.'" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <ul class="list-group list-group-flush">';
                           
            for($j=0; $j<count($result); $j++) {
                $menu .= '<li class="list-group-item"><a class="dropdown-item" href="'.base_url().'plp/sc/'. $result[$j]['id'] .'">'. $result[$j]['subcategoryname'] .'</a></li>';
                
            }
            $menu .= '  </ul>
                        </div>
                        </div>
                    </div>';
        }

        $data = [
            "menu" => $menu
        ];
        return json_encode($data);
    }

    

}