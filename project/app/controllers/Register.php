<?php 

class Register extends Controller {
    public function index() {
        $data['judul'] = 'Register';
        $data['css'] = 'css/style/register/style2.css';
        $data['js'] = 'js/script/jquery2.js';
        $this->view('templates/header', $data);
        $this->view('register/index', $data);
        $this->view('templates/footer', $data);
    }
}