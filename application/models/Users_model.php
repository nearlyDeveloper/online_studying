<?php
class users_model extends MY_Model {
	protected $table_name = 'users';
	protected $order_by = 'id asc';
	public $rules = array(
		'email' => array('field' => 'email', 'label' => 'почта', 'rules' => 'trim|required|valid_email|is_unique[users.email]'),
		'password' => array('field' => 'password', 'label' => 'пароль', 'rules' => 'trim|required|min_length[6]|md5'),
		'passconf' => array('field' => 'passconf', 'label' => 'повторите пароль', 'rules' => 'trim|required|matches[password]|md5'),
		'login' => array('field' => 'login', 'label' => 'логин', 'rules' => 'trim|required|min_length[5]|max_length[12]|is_unique[users.login]'),
	);


}
?>