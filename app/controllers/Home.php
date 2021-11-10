<?php

//Method default yang dipanggil jika tidak memasukkan method apapaun

class Home extends Controller{
    public function index(){
        $data['judul'] = 'About Me';
        $data['nama'] = $this->model('User_model')->getUser();       

        $this->view('templates/header', $data);

        $this->view('home/index', $data);

        $this->view('templates/footer');

    }

    public function coba(){
        $data['judul'] = 'About Me';       

        $this->view('templates/header', $data);

        $this->view('home/coba');

        $this->view('templates/footer');

    }
}

?> 

