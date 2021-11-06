<?php

class Logout extends Controller
{
    public function __construct()
    {
        session_start();
        require_once 'Landing.php';
        session_destroy();
        header('location: ' . BASEURL . 'landing');
        exit;
    }
}
