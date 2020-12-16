<?php


namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
    }

    public function loginAction(){
        if(!empty($_POST)){
            if(!$this->model->validate(['login', 'password'], $_POST)){
                $this->view->message('error', $this->model->error);
            }elseif(!$this->model->checkData($_POST['login'], $_POST['password'])){
                $this->view->message('error', 'Неверный логин или пароль');
            }elseif(!$this->model->checkStatus('login', $_POST['login'])){
                $this->view->message('error', $this->model->error);
            }


            $this->model->login($_POST['login']);
            $this->view->location('rules');
        }
        $this->view->render('Вход');
    }

    public function registerAction(){
        if(!empty($_POST)){
            if(!$this->model->validate(['email', 'login', 'password'], $_POST)){
                $this->view->message('error', $this->model->error);
            }elseif($this->model->ckeckEmailExists($_POST['email'])){
                $this->view->message('error', 'Этот E-mail уже используется');
            }elseif(!$this->model->ckeckLoginExists($_POST['login'])){
                $this->view->message('error', $this->model->error);
            }

            $this->model->register($_POST);
            $this->view->message('success', 'Регистрация завершена, подтвердите свой E-mail');
        }
        $this->view->render('Регистрация');
    }

    public function confirmAction(){
        if(isset($this->route['token'])) {
            if(!$this->model->checkTokenExists($this->route['token'])){
                $this->view->redirect('/account/login');
            }

            $this->model->activate($this->route['token']);
            $this->view->render('Регистрация завершена');
        }
    }

    public function profileAction(){
        if(!empty($_POST)){
            if(!$this->model->validate(['email'], $_POST)){
                $this->view->message('error', $this->model->error);
            }

            $id = $this->model->ckeckEmailExists($_POST['email']);

            if($id and $id != $_SESSION['account']['id']){
                $this->view->message('error', 'Этот E-mail уже используется');
            }

            if(!empty($_POST['password']) and !$this->model->validate(['password'], $_POST)){
                $this->view->message('error', $this->model->error);
            }
            if(isset($_FILES['img']['tmp_name'])){
                // Загрузка изображений
                $this->model->postUploadAv($_FILES['img']['tmp_name'], $_SESSION['account']['id']);
            }

            $this->model->save($_POST);
            $this->view->message('success', 'Сохранено', 'reload');

        }


        $vars = [
            'level' => $this->levels[$_SESSION['account']['level']],
        ];

        $this->view->render('Профиль', $vars);
    }

    public function logoutAction(){
        unset($_SESSION['account']);
        $this->view->redirect('/account/login');
    }

    public function recoveryAction(){
        if(!empty($_POST)){
            if(!$this->model->validate(['email'], $_POST)){
                $this->view->message('error', $this->model->error);
            }elseif(!$this->model->ckeckEmailExists($_POST['email'])){
                $this->view->message('error', 'Email указан неверно');
            }elseif(!$this->model->checkStatus('email', $_POST['email'])){
                $this->view->message('error', $this->model->error);
            }
            $this->model->recovery($_POST);
            $this->view->message('success', 'Запрос на восстановление пароля отправлен на E-mail');
        }
        $this->view->render('Восстановление пароля');
    }

    public function resetAction(){
        if(isset($this->route['token'])){
            if(!$this->model->checkTokenExists($this->route['token'])){
                $this->view->redirect('/account/login');
            }

            $password = $this->model->reset($this->route['token']);
            $vars = [
                'password' => $password,
            ];
            $this->view->render('Пароль сброшен', $vars);
        }
    }
}