<?php

class Home extends Controller
{
    //Default Method
    public function index()
    {
        $data['judul'] = 'Landing Page';
        $data['b_css'] = 'css/bootstrap/bootstrap.css';
        $data['css'] = 'css/style/landing_page/style.css';
        $data['b_js'] = 'js/bootstrap/bootstrap.js';
        $data['js'] = 'js/script/jquery.js';
        $data['background'] = 'images/landing_page.png';
        $data['star'] = 'images/star.png';
        $this->view('templates/header', $data);
        $this->view('landing_page/index', $data);
        $this->view('templates/footer', $data);
    }
}
