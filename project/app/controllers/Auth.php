<?php

class Auth extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        if (isset($_SESSION['login'])) {
            header('location: ' . BASEURL . 'home');
            exit;
        }
        $data['judul'] = 'Welcome';
        $data['css'] = 'css/style/login/style3.css';
        $data['js'] = 'js/script/auth/jquery1.js';
        $this->view('templates/header', $data);
        $this->view('login_register/index', $data);
        $this->view('templates/footer', $data);
    }

    public function login()
    {
        if (isset($_POST['signin'])) {
            $email = $_POST['email_l'];
            $password = $_POST['password_l'];
            $user = $this->model('User')->getDataByEmail($email);

            if ($user) {
                if ($user['password'] === $password) {
                    if (isset($_POST['check'])) {
                        $_SESSION['login'] = true;
                    }
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    Flasher::setFlash($_SESSION['username'], '', 'success', '');
                    header('location: ' . BASEURL . 'home');
                    exit;
                } else {
                    Flasher::setFlash('Password', 'salah', 'danger', '');
                    setcookie('isPassword', true, time() + 1, '/');
                }
            } else {
                Flasher::setFlash('Email', 'tidak terdaftar', 'danger', '');
                setcookie('isEmail', true, time() + 1, '/');
            }
            header('location: ' . BASEURL . 'auth');
            exit;
        }
    }

    public function register()
    {
        $result = $this->model('User')->insertData($_POST);
        if ($result == 'password') {
            echo "<script>
            window.alert('Akun gagal didaftarkan. Password yang anda masukkan tidak sama');
            </script>";
        } else if ($result == 'email') {
            echo "<script>
            window.alert('Akun gagal didaftarkan. Email sudah terdaftar, gunakan email lain');
            </script>";
        } else if ($result == 'username') {
            echo "<script>
            window.alert('Akun gagal didaftarkan. Username sudah terdaftar, gunakan username lain');
            </script>";
        } else if (isset($_POST['signup']) && $result > 0) {
            echo "<script>
            window.alert('Akun berhasil dibuat');
            </script>";
        }
        $url = BASEURL;
        echo "<script>
        window.location.href='$url'+'auth';
        </script>";
        exit;
    }

    // public function getUbah()
    // {
    //     echo json_encode($this->model('User')->getDataById($_POST['id']));
    // }

    public function cekData()
    {
        $result = $this->model('User')->getDataByEmail($_POST['email_c']);
        $result2 = $this->model('User')->getDataByUsername($_POST['username_c']);
        setcookie('ubahPassword', true, time() + 1, '/');
        if ($result && $result2) {
            $cek = $this->model('User')->ubahPassword($_POST);
            if (!$cek) {
                Flasher::setFlash('Akun', $_POST['email_c'], 'danger', 'gagal diubah (Password harus sama)');
            } else {
                Flasher::setFlash('Akun', $_POST['email_c'], 'success', 'berhasil diubah');
            }
        } else {
            Flasher::setFlash('Akun', $_POST['email_c'], 'danger', 'tidak ditemukan! (Periksa kembali email dan username)');
        }
        header('location: ' . BASEURL . 'auth');
        exit;
    }
}
