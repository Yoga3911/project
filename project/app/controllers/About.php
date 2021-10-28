<?php
//Coba2
class About extends Controller
{
    //Default Method + Params
    public function index($nama = 'Yoga')
    {
        $data = [];
        $data['nama'] = $nama; 
        $data['status'] = 'Mahasiswa';
        $data['judul'] = 'About';
        $data['css'] = '';
        $data['js'] = '';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    
    public function page()
    {
        echo 'About/page';
    }
}
