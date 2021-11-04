<?php

class Landing extends Controller
{
    //Default Method
    public function index()
    {
        $data['judul'] = 'Landing Page';
        $data['css'] = 'css/style/landing/style.css';
        $data['js'] = 'js/script/jquery2.js';
        $this->view('templates/header', $data);
        $this->view('landing/index', $data);
        $this->view('templates/footer', $data);
    }
}
