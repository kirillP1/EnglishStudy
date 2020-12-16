<?php


namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'admin';

        if($_SESSION['account']['login'] == 'admin'){
            $_SESSION['admin'] = true;
            return true;
        }else{
            $_SESSION['admin'] = false;
        }
    }

    public function loginAction(){
        if(!$_SESSION['admin']){
            if(!empty($_POST)){
                // Проверка на наличие ошибок в запросе вхожа
                if(!$this->model->loginValidate($_POST)){
                    // Вход в админку
                    $_SESSION['admin'] = true;
                    $this->view->location('../admin/'.$this->table.'/add');
                }else{
                    // Ошибка
                    $error = $this->model->loginValidate($_POST);
                    $this->view->message('Error', $error);
                }
            }else{
                // Страница входа
                $this->view->render('Вход');
            }
        }else{
            // Перебрасывание в админку, если уже зарегистрирован
            $this->view->redirect('../admin/'.$this->table.'/add');
        }
    }

    public function indexAction(){
        if(!$_SESSION['admin']){
            // Перебрасывание на страницу входа
            $this->view->redirect('../admin/login');
        }else{
            // Перебрасывание в админку, если уже зарегистрирован
            $this->view->redirect('../admin/'.$this->table.'/add');
        }
    }

    public function logoutAction(){
        // Выход из админки
        $this->view->redirect('/');
    }

    public function postsAction(){
        // Вывод постов
        $vars = [
            'posts' => $this->model->getNews(),
        ];
        $this->view->render('Посты', $vars);
    }

    public function categoryAction(){

        // Вывод категорий
        if(!isset($this->category)){
            $vars = [
                'category' => $this->model->getNews(),
            ];
            $this->view->render('Категория', $vars);
        }else{
            // Вывод поста по категории
            $vars = [
                'categoryName' => $this->category,
                'category' => $this->model->getCategory($this->category),
            ];
            $this->view->render('Категория', $vars);
        }


    }

    public function addAction(){
        // Проверка на наочие запроса
        if(!empty($_POST)){

            // Проверка на правильность запроса
            if(!$this->model->postValidate($_POST, $this->route['action'], $this->route['table'])){
                // Проверка на наличие типа поста
                if(isset($this->table)){
                    // Создание запроса на вставление в БД информацию о новом посте
                    $add = 'add' . ucfirst($this->table) . 'Post';
                    $id = $this->model->$add();
                }
                if(isset($_FILES['img']['tmp_name'])){
                    // Загрузка изображений
                    $this->model->postUploadImg($_FILES['img']['tmp_name'], $id);
                }else if(isset($_FILES['audio']['tmp_name'])){
                    // Загрузка аудио
                    $this->model->postUploadAudio($_FILES['audio']['tmp_name'], $id);
                }
                $this->view->message('success', 'Запись добавлена');
            }else{
                // Ошибка
                $error = $this->model->postValidate($_POST, $this->route['action'], $this->route['table']);
                $this->view->message('error', $error);
            }
        }
        $this->view->render('Добавление');
    }

    // Удаление поста
    public function deleteAction(){
        $this->model->delete($this->route['id']);
        $this->view->redirect('/admin/'.$this->table.'/posts');

    }
    // Редактирование поста
    public function editAction(){
        // Проверка на наличие запроса
        if(!empty($_POST)){
            // Проверка на наличие ошибок в запросе
            if(!$this->model->postValidate($_POST, $this->route['action'], $this->route['table'])){
                // Создание запроса на обновление информации о посте в БД
                if(isset($this->table)){
                    $edit = 'edit' . ucfirst($this->table) . 'Post';
                    $this->model->$edit($this->route['id']);
                }

                if(isset($_FILES['img']['tmp_name'])){
                    // Загрузка изображений
                    $this->model->postUploadImg($_FILES['img']['tmp_name'], $this->route['id'], $this->route['action']);
                }else if(isset($_FILES['audio']['tmp_name'])){
                    // Загрузка аудио
                    $this->model->postUploadAudio($_FILES['audio']['tmp_name'], $this->route['id'], $this->route['action']);
                }

                // Переброс на страницу постов
                $this->view->location('../admin/'.$this->table.'/posts');
            }else{
                // Ошибка
                $error = $this->model->postValidate($_POST, $this->route['action'], $this->route['table']);
                $this->view->message('error', $error);
            }
        }
        // Взятие информации о посте из БД по id
        $data = $this->model->getPost($this->route['id']);
        $data = $data[0];
        $vars = [
            'data' => $data,
        ];
        $this->view->render('Настройка', $vars);
    }
}