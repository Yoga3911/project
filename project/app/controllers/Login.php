<?php

class Login extends Controller {
    public function index() {
        $data['judul'] = 'Login';
        $data['css'] = 'css/style/login/style3.css';
        $data['js'] = 'js/script/jquery3.js';
        $this->view('templates/header', $data);
        $this->view('login/index', $data);
        $this->view('templates/footer', $data);
    }
}