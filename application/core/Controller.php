<?php


namespace application\core;

use application\core\View;
use application\core\Model;

abstract class Controller
{
    public $route;
    public $table;
    public $view;
    public $model;
    public $acl;
    public $category;
    public $levels;
    public $myLevel;

    public function __construct($route)
    {

        $this->route = $route;

        // Проверка на наличие типа поста
        if(isset($route['table'])) {
            $this->table = $route['table'];
        }else{
            $this->table = 'rules';
        }



        // Проверка на подходящйю роль к странице
        if(!$this->checkAcl()){
            View::errorCode('403');
        }
        // Вызов класса View
        $this->view = new View($this->route);
        // Вызов подходящего класса Model
        $this->model = $this->loadModel($this->route['controller']);

        if(isset($route['category'])) {
            $this->category = $route['category'];
            $this->category = $this->latToRu($this->category);

            $this->category =  $this->model->mb_ucfirst($this->category);

        }
        $this->levels = require 'application/config/levels.php';
        $this->before();
    }

    public function before(){

    }
    // Проверка на наличие классов Model
    public function loadModel($name){
        $path = 'application\models\\' . ucfirst($name);
        if(class_exists($path)){
            return new $path($this->route);
        }
    }
    // Вызов массива с расперделением страниц по ролям пользователей (admin, guest...)
    public function checkAcl(){
        $acl_path = 'application/acl/' . $this->route['controller'] . '.php';

        if(file_exists($acl_path)){
            $this->acl = require $acl_path;
        }else{
            exit('fuck');
        }

        if($this->inAcl('all')){
            return true;
        }else if($this->inAcl('authorize') and isset($_SESSION['account']['id'])){
            return true;
        }else if($this->inAcl('guest') and !isset($_SESSION['account']['id'])){
            return true;
        }else if($this->inAcl('admin') and isset($_SESSION['admin'])){
            return true;
        }else{
            return false;
        }
    }

    // Проверка на наличие страницы в определенном типе ролей
    public function inAcl($key=[]){
        if(empty($key)){
            return false;
        }else{
            return in_array($this->route['action'], $this->acl[$key]);
        }
    }

    /*public function latToRu($var){
        $rus=array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я','а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' ');
        $lat=array('A','B','V','G','D','E','E','GH','Z','I','Y','K','L','M','N','O','P','R','S','T','U','F','H','C','CH','SH','SCH','Y','Y','Y','E','YU','YA','a','b','v','g','d','e','e','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya',' ');
        $var = str_replace($lat, $rus, $var);
        return $var;
    }
    public function ruToLat($var){
        $rus=array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я','а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' ');
        $lat=array('A','B','V','G','D','E','E','GH','Z','I','Y','K','L','M','N','O','P','R','S','T','U','F','H','C','CH','SH','SCH','Y','Y','Y','E','YU','YA','a','b','v','g','d','e','e','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya',' ');
        $var = str_replace( $rus, $lat, $var);
        return $var;
    }
    */

    function latToRu($input){
        $gost = array(
            "a"=>"а","b"=>"б","v"=>"в","g"=>"г","d"=>"д","e"=>"е","yo"=>"ё",
            "j"=>"ж","z"=>"з","i"=>"и","i"=>"й","k"=>"к",
            "l"=>"л","m"=>"м","n"=>"н","o"=>"о","p"=>"п","r"=>"р","s"=>"с","t"=>"т",
            "y"=>"у","f"=>"ф","h"=>"х","c"=>"ц",
            "ch"=>"ч","sh"=>"ш","sh"=>"щ","ⓛ"=>"ы","e"=>"е","u"=>"у","ya"=>"я","A"=>"А","B"=>"Б",
            "V"=>"В","G"=>"Г","D"=>"Д", "E"=>"Е","Yo"=>"Ё","J"=>"Ж","Z"=>"З","I"=>"И","I"=>"Й","K"=>"К","L"=>"Л","M"=>"М",
            "N"=>"Н","O"=>"О","P"=>"П",
            "R"=>"Р","S"=>"С","T"=>"Т","Y"=>"Ю","F"=>"Ф","H"=>"Х","C"=>"Ц","Ch"=>"Ч","Sh"=>"Ш",
            "Sh"=>"Щ","I"=>"Ы","E"=>"Е", "U"=>"У","Ya"=>"Я","'"=>"ь","'"=>"Ь","''"=>"ъ","''"=>"Ъ","j"=>"ї","i"=>"и","g"=>"ґ",
            "ye"=>"є","J"=>"Ї","I"=>"І",
            "G"=>"Ґ","YE"=>"Є"
        );
        return strtr($input, $gost);
    }

    function ruToLat($input){
        $gost = array(
            "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
            "е"=>"e", "ё"=>"yo","ж"=>"j","з"=>"z","и"=>"i",
            "й"=>"i","к"=>"k","л"=>"l", "м"=>"m","н"=>"n",
            "о"=>"o","п"=>"p","р"=>"r","с"=>"s","т"=>"t",
            "у"=>"y","ф"=>"f","х"=>"h","ц"=>"c","ч"=>"ch",
            "ш"=>"sh","щ"=>"sh","ы"=>"ⓛ","э"=>"e","ю"=>"u",
            "я"=>"ya",
            "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
            "Е"=>"E","Ё"=>"Yo","Ж"=>"J","З"=>"Z","И"=>"I",
            "Й"=>"I","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
            "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
            "У"=>"Y","Ф"=>"F","Х"=>"H","Ц"=>"C","Ч"=>"Ch",
            "Ш"=>"Sh","Щ"=>"Sh","Ы"=>"I","Э"=>"E","Ю"=>"U",
            "Я"=>"Ya",
            "ь"=>"","Ь"=>"","ъ"=>"","Ъ"=>"",
            "ї"=>"j","і"=>"i","ґ"=>"g","є"=>"ye",
            "Ї"=>"J","І"=>"I","Ґ"=>"G","Є"=>"YE"
        );
        return strtr($input, $gost);
    }
}