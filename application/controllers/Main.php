<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {
	
	function __Construct() {
        parent::__construct();
    }

	public function index()
	{
		$this->data['content'] = 'main';
		$this->data['title'] = 'Главная страница';
        $this->load->view('template', $this->data);
	}
    public function signout() {
        $this->session->sess_destroy();
        redirect('/');
    }
}
