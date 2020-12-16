<?php


namespace application\controllers;

use application\core\Controller;
use application\lib\Db;


class MainController extends Controller
{


    public function indexAction(){
        // Проверка на наличие вида поста
        if(!isset($this->route['table'])){
            $this->view->redirect('../'.$this->table);
        }
        $vars = [
            'posts' => $this->model->getNews(),
            'tableName' => $this->table,
            'categoryList' => $this->model->getNews(),
        ];
        $this->view->render('Посты', $vars);
    }

    public function categoryAction(){
        // Вывод поста по категории
        $vars = [
            'tableName' => $this->table,
            'categoryName' => $this->category,
            'categoryList' => $this->model->getNews(),
            'category' => $this->model->getCategory($this->category),
        ];
        $this->view->render('Категория', $vars);
    }

    public function postAction(){
        //debug($_SESSION);
        // Взятие информации о посте из БД по id
        $data = $this->model->getPost($this->route['id']);
        $data = $data[0];

        if(!empty($_POST)){
            //debug($_POST);

            $this->model->checkAnswer($data, $_POST);
            $this->model->updateExp();
            $this->model->getLevel($this->levels);

        }

        $vars = [
            'tableName' => $this->table,
            'data' => $data,
        ];
        $this->view->render('Настройка', $vars);
    }
}