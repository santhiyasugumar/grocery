<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Config\BaseConfig;
class Login extends Controller {

    use ResponseTrait;

    public function index() {
        session_start();
        session_destroy();
        echo view('login_view');
    }

    public function getLoginDetails() {
        $loginUsername = $this->request->getVar('loginUsername');
        $loginPassword = $this->request->getVar('loginPassword');

        if($loginUsername == 'admin' && $loginPassword == 'admin@1234') {
            session_start();
            $_SESSION['loginid'] = "1";
            $_SESSION['role'] = "admin";
            echo "success";
        } else {
           echo "Invalid User";
        }
        
    }

}