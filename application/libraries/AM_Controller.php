<?php
class AM_Controller extends MY_Controller {
	function __Construct() {
        parent::__construct();
		$this->load->model('users_model');

        if (!$this->session->id) redirect('/user/auth/login');

		$this->data['user'] = $this->users_model->get($this->session->id);
		if (!@$this->data['user']) die("User not found!"); // Check for user
		if ($this->data['user']->group != 2) redirect('/');
    }
}
?>