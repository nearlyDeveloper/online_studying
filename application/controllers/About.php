<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller {
	
	function __Construct() {
        parent::__construct();
    }

	public function index()
	{
		$this->data['content'] = 'about';
		$this->data['title'] = 'О сайте';
        $this->load->view('template', $this->data);
	}
}
