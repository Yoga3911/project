<?php

class Auth extends Controller
{
    public function __construct()
    {
        session_start();
        require_once 'Home.php';
    }

    public function index()
    {
        if ($_SESSION['login']) {
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
                }
            }
            header('location: ' . BASEURL . 'auth');
            exit;
        }
    }
}
