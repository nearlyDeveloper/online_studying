<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

    function __Construct() {
        parent::__construct();
        $this->load->model('users_model');
        if ($this->session->id) redirect('/');
    }

    public function register()
    {
        $this->form_validation->set_rules($this->users_model->rules);

        if ($this->form_validation->run()) {
            $data = $this->users_model->arrayFromPost(['login','email','password']);
            $userId = $this->users_model->save($data);

            $this->session->set_userdata(['id' => $userId]);
            redirect('/');
        }

        $this->data['description'] = 'Страница регистрации';
        $this->data['title'] = 'Регистрация';
        $this->data['content'] = 'auth/register';
        $this->load->view('auth/template', $this->data);
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $userId = @$this->users_model->getBy([
                'login' => $this->input->post('login'),
                'password' => md5($this->input->post('password')),
            ], TRUE)->id;

            if (!$userId) {
                $userId = @$this->users_model->getBy([
                    'email' => $this->input->post('login'),
                    'password' => md5($this->input->post('password')),
                ], TRUE)->id;
            }

            if ($userId) {
                $this->session->set_userdata(['id' => $userId]);
                redirect('/');
            }
        }
        $this->data['description'] = 'Страница авторизации';
        $this->data['title'] = 'Авторизация';
        $this->data['content'] = 'auth/login';
        $this->load->view('auth/template', $this->data);
    }

}
