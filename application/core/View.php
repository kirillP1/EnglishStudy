<?php


namespace application\core;


class View
{
    public $route;
    public $path;
    public $layout = 'default';

    public function __construct($route){
        $this->route = $route;

        // Создание пути к странице внутри папки Views
        if($route['action'] != 'login' and isset( $this->route['table'])){
            $this->path = $route['controller'] . '/' . $this->route['table'] . '/' . $route['action'];
        }else {
            $this->path = $route['controller'] . '/' . $route['action'];
        }
    }

    public function render($title, $vars = []){
        extract($vars);
        // Создание путей к видам
        $layout_path = 'application/views/layouts/' . $this->layout . '.php';
        $view_path = 'application/views/' . $this->path . '.php';

        if(file_exists($view_path)){
            // Формируем из внутренностей файла $view_path пременную $content
            ob_start();
            require $view_path;
            $content = ob_get_clean();
            require $layout_path;
        }else{
            echo 'Вид не найден' . $view_path;
        }
    }
    // Переброска на определенную страницу
    public function redirect($url){
        header('Location: ' . $url);
        exit;
    }

    // Вывод ошибки
    public static function errorCode($code){
        // Фиксирование ошибки в браузере
        http_response_code($code);
        // Создание пути к виду ошибки
        $path_error = 'application/views/errors/' . $code . '.php';

        if(file_exists($path_error)){
            require $path_error;
        }

        exit;
    }
    // Вывод сообщений
    public function message($status, $message, $reload = []){
        if(isset($reload)){
            exit(json_encode(['status' => $status, 'message' => $message, 'reload' => $reload]));
        }else{
            exit(json_encode(['status' => $status, 'message' => $message]));
        }
    }
    // Переброска на определенную страницу с помощбю AJAX
    public function location($url){
        exit(json_encode(['url' => $url]));
    }
}