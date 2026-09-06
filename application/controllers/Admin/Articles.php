<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends AM_Controller {

    function __Construct() {
        parent::__construct();
        $this->load->model('cources_model');
        $this->load->model('articles_model');
    }

    public function view($id)
    {
        if (!$id) show_404();
        $this->data['articles'] = $this->articles_model->getBy(['cource' => $id]);
        $this->data['id'] = $id;
        $this->data['content'] = 'admin/articles/index';
        $this->data['title'] = 'Просмотр статьей курса';
        $this->load->view('admin/template', $this->data);
    }

    public function add($id)
    {
        if (!$id) show_404();
        //Если данные с формы верны
        if($_POST) {
            //получаем массив данных
            $data = $this->articles_model->arrayFromPost(['name', 'icon', 'text']);
            $data['cource'] = $id;
            //Сохранение данных в бд
            $this->articles_model->save($data);
            redirect('/admin/articles/view/'.$id);
        }
        $this->data['id'] = $id;
        $this->data['content'] = 'admin/articles/add';
        $this->data['title'] = 'Добавить курс';
        $this->load->view('admin/template', $this->data);
    }

    public function edit($id)
    {
        if (!$id) show_404();
        //Get subject from base
        $article = $this->articles_model->get($this->input->get('id'));
        if (!$article || !$id) show_404();

        //Если данные с формы верны
        if($_POST) {
            //получаем массив данных
            $data = $this->articles_model->arrayFromPost(['name', 'icon', 'text']);
            $data['cource'] = $id;
            //Сохранение данных в бд
            $this->articles_model->save($data, $id);
            redirect('/admin/articles/view/'.$id);
        }

        $this->data['id'] = $id;
        $this->data['article'] = $article;
        $this->data['content'] = 'admin/articles/edit';
        $this->data['title'] = 'Редактировать статью '.$article->name;
        $this->load->view('admin/template', $this->data);
    }

    public function delete($id)
    {
        if (!$id) show_404();
        $article = $this->articles_model->get($this->input->get('id'));
        if (!$article || !$id) show_error("Статья #$id не найдена!");

        //Удаляем
        $this->articles_model->delete($this->input->get('id'));

        redirect('/admin/articles/view/'.$id);
    }

}