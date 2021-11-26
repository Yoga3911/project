<?php

class Keranjang extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        $data['judul'] = 'Keranjang';
        $data['css'] = 'css/style/cart/style.css';
        $data['js'] = 'js/script/cart/jquery.js';
        $data['produk'] = $this->model('Cart')->getDataByUser($_SESSION['id']);
        // var_dump($data['produk']); die;
        $this->view('templates/header', $data);
        $this->view('cart/index', $data);
        $this->view('templates/footer', $data);
    }

    public function hapus($id)
    {
        $this->model('Cart')->deleteProduct($id);
        setcookie('produk', true, time() + 1, '/');
        Flasher::setFlash('berhasil', 'dihapus', 'danger', '');
        header('location: ' . BASEURL . 'home');
        exit;
    }
}
