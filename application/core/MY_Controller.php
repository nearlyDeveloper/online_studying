<?php
class MY_Controller extends CI_Controller {
	
	function __Construct() {
        parent::__construct();
        $this->load->model('cources_model');
		//Добавляем данные о пользователе, если такие есть
		if ($this->session->id) {
			$this->load->model('users_model');
			$this->user = $this->users_model->get($this->session->id);
			$this->data['user'] = $this->user;
		}
        $this->data['cources'] = $this->cources_model->get();
		
    }
}
?>