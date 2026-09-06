<?php
class US_Controller extends MY_Controller {
	function __Construct() {
        parent::__construct();
        if (!$this->session->id) redirect('/user/auth/login');
    }
}
?>