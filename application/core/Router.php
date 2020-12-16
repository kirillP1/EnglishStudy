<?php


namespace application\core;

use application\core\View;
class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct(){
        $arr = require 'application/config/routes.php';

        foreach($arr as $key => $value){
            $this->add($key, $value);
        }

    }

    public function add($route, $params){

        // Добавления списка страниц в масив routes
        $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
        $route = '#^' . $route . '$#';


        $this->routes[$route] = $params;


    }

    public function match(){

        // Проверка на совпадение страницы браузера с существующими страницами
        $rus=array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я','а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' ');
        $lat=array('A','B','V','G','D','E','E','GH','Z','I','Y','K','L','M','N','O','P','R','S','T','U','F','H','C','CH','SH','SCH','Y','Y','Y','E','YU','YA','a','b','v','g','d','e','e','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya',' ');
        $_SERVER ['REQUEST_URI'] = urldecode($_SERVER['REQUEST_URI']);
        $_SERVER ['REQUEST_URI'] = str_replace($rus, $lat, $_SERVER ['REQUEST_URI']);
        //debug($_SERVER ['REQUEST_URI']);

        $url = mb_strtolower(trim($_SERVER ['REQUEST_URI'], '/'));


        foreach ($this->routes as $route => $params){



            if(preg_match($route, $url, $matches)){

                foreach ($matches as $key => $match) {
                    // Проверка на вид переменных
                    if (is_string($key)) {
                        if (is_numeric($match)) {
                            $match = (int) $match;
                        }

                        $params[$key] = $match;
                    }
                }
                // Введение в массив params данных о текущей странице
                $this->params = $params;

                return true;
            }
        }
        return false;
    }

    public function run(){
        if($this->match()){
            // Созддание пути к классу Controller
            $class = ucfirst($this->params['controller']) . 'Controller';
            $path = 'application\controllers\\' . $class;

            // Проверка на наличие класса Controller
            if(class_exists($path)){

                // Проверка на наличие Action
                $action = $this->params['action'] . 'Action';
                if(method_exists($path, $action)){


                    // Создание класса Controller
                    $controller = new $path($this->params);
                    $controller->$action();
                }else{
                    View::errorCode(404);
                }
            }else{
                View::errorCode(404);
            }
        }else{
            View::errorCode(404);
        }
    }

}