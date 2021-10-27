<?php

class App
{
    //Default URL
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        //Get data dari URL
        $url = $this->parseURL();

        //Controller
        //Cek apakah ada file dengan nama + url index 0 .php
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            //Timpa default controller
            $this->controller = $url[0];
            //Hapus index 0 pada array
            unset($url[0]);
        }
        //Instansiasi Class Controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //Method
        //Cek apakah ada url dengan index 1
        if (isset($url[1])) {
            //Cek apakah ada method pada class tertentu (1 = Class dari controller, 2 = Method nya)
            if (method_exists($this->controller, $url[1])) {
                //Timpa default method
                $this->method = $url[1];
                //Hapus index 1 pada array
                unset($url[1]);
            }
        }

        //Paramater
        //Cek apakah ada paramater pada url (url index > 1)
        if (!empty($url)) {
            //Timpa default paramater
            $this->params = array_values($url);
        }

        //Memanggil Class, Method, dan Parameter baru jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    //Parse URL sebelum diolah
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            //Hapus / di kata terakhir
            $url = rtrim($_GET['url'], '/');
            //Filter karakter aneh pada URL
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //Jadikan URL sebagai array dengan delimiter /
            $url = explode('/', $url);
            return $url;
        }
    }
}