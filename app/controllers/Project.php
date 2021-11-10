<?php


class Project extends Controller {
    public function index(){
        $this->view('templates/header');
        $this->view('project/index');
        $this->view('templates/footer');

    }
}

?>