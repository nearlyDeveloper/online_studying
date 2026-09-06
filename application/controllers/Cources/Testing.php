<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends MY_Controller {

    function __Construct() {
        parent::__construct();
    }

    public function index($id)
    {
        $cource = $this->cources_model->get($id);
        if (!$cource) show_404();

        $this->data['cource'] = $cource;
        $this->data['content'] = 'cources/test';
        $this->data['title'] = 'Тест курса';
        $this->load->view('template', $this->data);
    }

    public function loadTest($id) {
        //Get subject from base
        $cource = $this->cources_model->get($id);
        if (!$cource || !$id) show_error("Курс #$id не найден!");

        die(json_encode(['data' => json_decode($cource->test)]));
    }
}
