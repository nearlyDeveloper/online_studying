<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends MY_Controller {

    function __Construct() {
        parent::__construct();
        $this->load->model('articles_model');
    }

    public function index($id)
    {
        $cource = $this->cources_model->get($id);
        if (!$cource) show_404();

        $this->data['articles'] = $this->articles_model->getBy(['cource' => $cource->id]);

        if ($this->data['user']) $this->data['user']->articles = json_decode($this->data['user']->articles);

        $this->data['cource'] = $cource;
        $this->data['content'] = 'cources/index';
        $this->data['title'] = 'Просмотр курса';
        $this->load->view('template', $this->data);
    }

}
