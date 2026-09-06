<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends AM_Controller {

    function __Construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->data['content'] = 'admin/main';
        $this->data['title'] = 'Главная страница';
        $this->load->view('admin/template', $this->data);
    }

}
