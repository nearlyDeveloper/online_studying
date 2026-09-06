<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends AM_Controller {

    function __Construct() {
        parent::__construct();
        $this->load->model('users_model');
    }

    public function index()
    {
        $this->data['users'] = $this->users_model->get();
        $this->data['title'] = 'Пользователи';
        $this->data['content'] = 'admin/users/index';
        $this->load->view('admin/template', $this->data);
    }

    public function edit($id)
    {
        $user = $this->users_model->get($id);
        if (!$user) return show_404();

        if ($_POST) {
            $data = $this->users_model->arrayFromPost(['group']);
            $this->users_model->save($data, $id);
            redirect('/admin/users');
        }

        $this->data['title'] = 'Редактировать пользователя #'.$user->id;
        $this->data['user'] = $user;
        $this->data['content'] = 'admin/users/edit';
        $this->load->view('admin/template', $this->data);
    }
}
