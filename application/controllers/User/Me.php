<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Me extends US_Controller {

    function __Construct() {
        parent::__construct();
        $this->load->model('cources_model');
        $this->load->model('articles_model');
    }

    public function index()
    {
        $user = $this->data['user'];
        $user->articles = json_decode($user->articles);

        $cources = $this->cources_model->get();
        $articles = $this->articles_model->get();

        foreach ($cources as $cource) {
            $cource->articles = [];
            $cource->all = 0;
            $cource->done = 0;

            foreach ($articles as $article) {
                $article->done = false;
                if ($article->cource == $cource->id) {
                    $cource->all++;
                    if (in_array($article->id, $user->articles)) {
                        $article->done = true;
                        $cource->done++;
                    }
                    $cource->articles[] = $article;
                }
            }
            $cource->percent = (int) ($cource->done/($cource->all*0.01));
        }

        $this->data['user'] = $user;
        $this->data['cources'] = $cources;
        $this->data['content'] = 'user/me';
        $this->data['title'] = 'Профиль '.$user->login;
        $this->load->view('template', $this->data);
    }

    public function setLogin() {
        $user = $this->data['user'];
        $_POST = json_decode(file_get_contents('php://input'), true);

        $login = $this->input->post('login', true);
        if (mb_strlen($login) < 5 || mb_strlen($login) > 12) die(json_encode(['error' => 'Логин может состоять от 5 до 12 символов!']));

        if ($user->login == $login) die(json_encode(['error' => 'У вас уже установлен этот логин!']));

        if ($this->users_model->getBy(['login' => $login, 'id !=' => $user->id])) die(json_encode(['error' => 'Этот логин уже используется!']));

        $this->users_model->save(['login' => $login], $user->id);
        die(json_encode(['status' => 'ok']));
    }
}
