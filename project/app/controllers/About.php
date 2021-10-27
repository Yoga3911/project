<?php
//Coba2
class About extends Controller
{
    //Default Method + Params
    public function index($nama = 'yoga')
    {
        $data['nama'] = 'Pengko'; 
        $data['status'] = 'Mahasiswa'; 
        $data['judul'] = 'About';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page()
    {
        echo 'About/page';
    }
}
