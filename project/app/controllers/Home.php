<?php

class Home extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        if (!isset($_SESSION['username']) && isset($_SESSION['login'])) {
            header('location: ' . BASEURL . 'auth');
            exit;
        }

        $data['css'] = 'css/style/home/style.css';
        $data['js'] = 'js/script/produk/jquery2.js';
        $data['judul'] = 'Home';
        $data['produk'] = $this->model('Produk')->getData();
        // $data['user'] = $this->model('User')->getDataByEmail($email);
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer', $data);
    }

    public function detail($id)
    {
        $data['css'] = 'css/style/home/style.css';
        $data['js'] = 'js/script/produk/jquery2.js';
        $data['judul'] = 'Detail';
        $data['produk'] = $this->model('Produk')->getDataById($id);
        $this->view('templates/header', $data);
        $this->view('home/detail', $data);
        $this->view('templates/footer', $data);
    }

    public function hapus($id)
    {
        $result = $this->model('Produk')->getDataById($id);
        unlink('images/' . $result['image']);
        $this->model('Produk')->deleteProduct($id);
        setcookie('produk', true, time() + 1, '/');
        Flasher::setFlash('berhasil', 'dihapus', 'danger', '');
        header('location: ' . BASEURL . 'home');
        exit;
    }

    public function addData()
    {
        $result = $this->model('Produk')->addProduct($_POST);
        if (isset($_POST['tambahProduk']) && $result > 0) {
            setcookie('produk', true, time() + 1, '/');
            Flasher::setFlash('berhasil', 'ditambahkan', 'success', '');
        } else if ($result == 'error') {
            setcookie('produk', true, time() + 1, '/');
            Flasher::setFlash('gagal', 'ditambahkan', 'danger', 'Unit dan Harga harus berupa angka');
        } else {
            setcookie('produk', true, time() + 1, '/');
        }
        header('location: ' . BASEURL . 'home');
        exit;
    }

    public function getUbah()
    {
        echo json_encode($this->model('Produk')->getDataById($_POST['id']));
    }

    public function ubah()
    {
        $result = $this->model('Produk')->ubahProduct($_POST);
        if ($result == 'none') {
            setcookie('produk', true, time() + 1, '/');
            Flasher::setFlash('tidak ada', 'perubahan', 'warning', '');
            // var_dump('dsa'); die;
        } else if (isset($_POST['tambahProduk']) && $result > 0) {
            setcookie('produk', true, time() + 1, '/');
            Flasher::setFlash('berhasil', 'diubah', 'success', '');
        } else {
            setcookie('produk', true, time() + 1, '/');
            Flasher::setFlash('gagal', 'diubah', 'danger', 'Unit dan Harga harus berupa angka');
        }
        header('location: ' . BASEURL . 'home');
        exit;
    }

    public function addKeranjang()
    {
        $result = $this->model('Produk')->getDataById($_POST['id1']);
        $this->model('Produk')->updateKeranjang($_POST['id1'], intval($result['unit']) - $_POST['count']);
        // if (intval($result['unit']) - $_POST['count'] == 0) {
        //     $result = $this->model('Produk')->getDataById($_POST['id1']);
        //     unlink('images/' . $result['image']);
        //     $this->model('Produk')->deleteProduct($_POST['id1']);
        // }
        $this->model('Cart')->addData($_POST['id1'], $_POST['qty']);
        header('location: ' . BASEURL . 'home');
        exit;
    }
}
