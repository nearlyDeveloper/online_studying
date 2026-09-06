<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cources extends AM_Controller {

    function __Construct() {
        parent::__construct();
        $this->load->model('cources_model');
    }

    public function index()
    {
        $this->data['cources'] = $this->cources_model->get();

        $this->data['content'] = 'admin/cources/index';
        $this->data['title'] = 'Просмотр списка курсов';
        $this->load->view('admin/template', $this->data);
    }

    public function add()
    {
        //Если данные с формы верны
        if($_POST) {
            //получаем массив данных
            $data = $this->cources_model->arrayFromPost(['name', 'image', 'descr']);
            //Сохранение данных в бд
            $this->cources_model->save($data);
            redirect('/admin/cources');
        }
        $this->data['content'] = 'admin/cources/add';
        $this->data['title'] = 'Добавить курс';
        $this->load->view('admin/template', $this->data);
    }

    public function edit($id)
    {
        //Get subject from base
        $cource = $this->cources_model->get($id);
        if (!$cource || !$id) show_error("Курс #$id не найден!");

        //Если данные с формы верны
        if($_POST) {
            //получаем массив данных
            $data = $this->cources_model->arrayFromPost(['name', 'image', 'descr']);
            //Сохранение данных в бд
            $this->cources_model->save($data, $id);
            redirect('/admin/cources');
        }

        $this->data['cource'] = $cource;
        $this->data['content'] = 'admin/cources/edit';
        $this->data['title'] = 'Редактировать курс '.$cource->name;
        $this->load->view('admin/template', $this->data);
    }

    public function test($id)
    {
        //Get subject from base
        $cource = $this->cources_model->get($id);
        if (!$cource || !$id) show_error("Курс #$id не найден!");

        $this->data['cource'] = $cource;
        $this->data['content'] = 'admin/cources/test';
        $this->data['title'] = 'Редактировать тест курса '.$cource->name;
        $this->load->view('admin/template', $this->data);
    }

    public function loadTest($id) {
        //Get subject from base
        $cource = $this->cources_model->get($id);
        if (!$cource || !$id) show_error("Курс #$id не найден!");

        die(json_encode(['data' => json_decode($cource->test)]));
    }

    public function saveTest($id) {
        $_POST = json_decode(file_get_contents('php://input'), true);
        //Get subject from base
        $cource = $this->cources_model->get($id);
        if (!$cource || !$id) show_error("Курс #$id не найден!");

        $data['test'] = $this->input->post('data');
        $this->cources_model->save($data, $id);
        echo json_encode(['status' => 'ok']);
    }

    public function delete($id)
    {
        //Get group from base
        $cource = $this->cources_model->get($id);
        if (!$cource || !$id) show_error("Курс #$id не найден!");

        //Удаляем
        $this->cources_model->delete($id);

        redirect('/admin/cources');
    }

}