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
        $data['css'] = 'css/style/login/style.css';
        $data['js'] = 'js/script/jquery2.js';
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
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    header('location: ' . BASEURL . 'home');
                    exit;
                } else {
                    setcookie('isPassword', true, time() + 3, '/');
                }
            } else {
                setcookie('isEmail', true, time() + 3, '/');
            }
            header('location: ' . BASEURL . 'auth');
            exit;
        }
    }

    public function register()
    {
        $result = $this->model('User')->insertData($_POST);
        if ($result == 'password'){
            echo "<script>
            window.alert('Password yang anda masukkan tidak sama');
            </script>";
        } else if ($result == 'email'){
            echo "<script>
            window.alert('Email sudah terdaftar, gunakan email lain');
            </script>";
        } else if ($result == 'username'){
            echo "<script>
            window.alert('Username sudah terdaftar, gunakan username lain');
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
}
