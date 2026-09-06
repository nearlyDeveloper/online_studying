<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends US_Controller {

    function __Construct() {
        parent::__construct();
        $this->load->model('articles_model');
    }

    public function index($id)
    {
        $article = $this->articles_model->get($id);
        if (!$article) show_404();

        $user = $this->data['user'];
        $user->articles = json_decode($user->articles);
        if (!in_array($id, $user->articles)) {
            $user->articles[] = $id;
            $this->users_model->save(['articles' => json_encode($user->articles)], $this->session->id);
        }

        $this->data['article'] = $article;
        $this->data['content'] = 'cources/article';
        $this->data['title'] = 'Просмотр статьи - '.$article->name;
        $this->load->view('template', $this->data);
    }

}
