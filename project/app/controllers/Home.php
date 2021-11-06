<?php

class Home extends Controller
{
    public function index()
    {
        $data['css'] = 'css/style/home/style2.css';
        $data['js'] = 'js/script/jquery2.js';
        $data['judul'] = 'Home';
        $data['produk'] = $this->model('Produk')->getData();
        // $data['user'] = $this->model('User')->getDataByEmail($email);
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer', $data);
    }

    public function detail($id)
    {
        $data['css'] = 'css/style/home/style2.css';
        $data['js'] = 'js/script/jquery2.js';
        $data['judul'] = 'Detail';
        $data['produk'] = $this->model('Produk')->getDataById($id);
        $this->view('templates/header', $data);
        $this->view('home/detail', $data);
        $this->view('templates/footer', $data);
    }
}
