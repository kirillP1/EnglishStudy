<?php


namespace application\models;


use application\core\Model;

class Admin extends Model
{
    public function __construct($route)
    {
        parent::__construct();

        if(isset($route['table'])) {
            $this->table = $route['table'];
        }
    }
    /**************************************************
     ***********Проверка на наличие ошибок***********
     **************************************************/
    public function loginValidate($post){
        $admin = require 'application/config/admin.php';
        // Проверка на правильность написания логина
        if($_POST['login'] != $admin['login']){
            $error = 'Неверный логин';
            return $error;
        }else if($_POST['password'] != $admin['password']){ // Проверка на правильность написания пароля
            $error = 'Неверный пароль';
            return $error;
        }

        return false;

    }

    public function postValidate($post, $type, $table){
        // Проверка на правильность имени постов
        if(isset($_POST['name'])){
            $name = strlen($_POST['name']);
            if($name < 1 or $name > 100){
                $error = 'Название должно быть не больше 100 символов';
                return $error;
            }
        }
        // Проверка на правильность описания постов
        if(isset($_POST['description'])){
            $description = strlen($_POST['description']);
            if($description < 1 or $description > 120){
                $error = 'Описание должно быть не больше 120 символов';
                return $error;
            }
        }
        // Проверка на правильность текста постов
        if(isset($_POST['text'])){
            $text = strlen($_POST['text']);
            if($text < 1){
                $error = 'Пустое поле текста';
                return $error;
            }
        }
        // Проверка на правильность название вопроса
        if(isset($_POST['testName'])){
            foreach ($_POST['testName'] as $key_t => $val_t){
                $text = strlen($val_t);
                if($text < 1){
                    $error = 'Пустое поле названия вопроса';
                    return $error;
                }
            }
        }
        // Проверка на правильность первого ответа
        if(isset($_POST['first'])){
            foreach ($_POST['first'] as $key_t => $val_t){
                $text = strlen($val_t);
                if($text < 1){
                    $error = 'Пустое поле ответа 1';
                    return $error;
                }
            }
        }
        // Проверка на правильность второго ответа
        if(isset($_POST['second'])){
            foreach ($_POST['second'] as $key_t => $val_t){
                $text = strlen($val_t);
                if($text < 1){
                    $error = 'Пустое поле ответа 2';
                    return $error;
                }
            }
        }
        // Проверка на правильность третьего ответа
        if(isset($_POST['third'])){
            foreach ($_POST['third'] as $key_t => $val_t){
                $text = strlen($val_t);
                if($text < 1){
                    $error = 'Пустое поле ответа 3';
                    return $error;
                }
            }
        }
        // Проверка на правильность выбора ответа
        if(isset($_POST['testName'])){
            if(count($_POST['test']) < count($_POST['testName'])){
                $error = 'Пустое поле выбора ответа';
                return $error;
            }
        }
        // Проверка на правильность выбора изображения
        if(empty($_FILES['img']['tmp_name']) and $table == 'rules' and $type == 'add'){
            $error = 'Изображение не выбранно';
            return $error;
        }elseif(empty($_FILES['img']['tmp_name']) and $table == 'post' and $type == 'add'){
            $error = 'Изображение не выбранно';
            return $error;
        }elseif(empty($_FILES['img']['tmp_name']) and $table == 'dictionary' and $type == 'add'){
            $error = 'Изображение не выбранно';
            return $error;
        }
        // Проверка на правильность выбора аудио
        if(empty($_FILES['audio']['tmp_name']) and $table == 'audio' and $type == 'add'){
            $error = 'Аудиозапись не выбранно';
            return $error;
        }elseif(empty($_FILES['audio']['tmp_name']) and $table == 'listening' and $type == 'add'){
            $error = 'Аудиозапись не выбранно';
            return $error;
        }

        return false;

    }



    // Загрузка ассетов

    public function postUploadImg($files, $id, $action = []){
        $dir = 'public/materials/'. $this->table;
        if(!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        if(!empty($files)){
            if(file_exists('public/materials/' . $this->table . '/' . $id . '.jpg')){
                unlink('public/materials/' . $this->table . '/' . $id . '.jpg');
            }
        }

        move_uploaded_file($files, 'public/materials/' . $this->table . '/' . $id . '.jpg');
    }

    public function postUploadAudio($files, $id, $action = []){
        $dir = 'public/materials/'. $this->table;
        if(!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        move_uploaded_file($files, 'public/materials/' . $this->table . '/' . $id . '_audio' . '.mp3');
    }



    // Получение чего-либо

    public function getPost($id){
        $idn = $this->db->row('SELECT * FROM '.$this->table.' WHERE id=' . $id);

        return $idn;
    }

    public function getCategory($category){

        $category = "'" . $category . "'";
        $cat = $this->db->row('SELECT * FROM '.$this->table.' WHERE category=' . $category);
        return $cat;
    }

    public function getNews(){
        $list = $this->db->row('SELECT * FROM '.$this->table);
        $length = count($list);
        for ($i = 0; $i < $length; $i++){
            if(isset($list[$i]['category'])){
                $list[$i]['category'] = $this->mb_ucfirst($list[$i]['category']);
            }
        }
        return $list;
    }

    // Общий метод удаления
    public function delete($id){
        $delete = $this->db->row('DELETE FROM '.$this->table.' WHERE id=' . $id);
        return $delete;
    }


    /********************************************
     *****************Виды постов****************
     ********************************************/

    // Rules post
    public function addRulesPost(){
        $params = [
            'hard' => $_POST['hard'],
            'name' => $_POST['name'],
            'text' => $_POST['text'],
            'category' => ucfirst($_POST['category']),
        ];
        $add = $this->db->query('INSERT INTO '.$this->table.' (hard, name, text, category) VALUES (:hard, :name, :text, :category)', $params);
        return $this->db->lastInsertId();
    }

    public function editRulesPost($id){
        $params = [
            'id' => $id,
            'hard' => $_POST['hard'],
            'name' => $_POST['name'],
            'text' => $_POST['text'],
            'category' => ucfirst($_POST['category']),
        ];
        $edit = $this->db->query('UPDATE '.$this->table.' SET hard = :hard, name = :name, text = :text, category = :category WHERE id = :id', $params);
        return $edit;
    }

    // Dictionary post
    public function addDictionaryPost(){

        // Получение слова и его перевода и введения из в одну переменную
        $word = $this->translate();

        $params = [
            'name' => $_POST['name'],
            'text' => $_POST['text'],
            'hard' => $_POST['hard'],
            'category' => ucfirst($_POST['category']),
        ];

        $cAr = $this->rowAndColumn($params, $word);
        extract($cAr);

        $add = $this->db->query('INSERT INTO '.$this->table.' (name, text, hard, category, '.$column.') VALUES ('. $row .')', $params);
        return $this->db->lastInsertId();
    }

    public function editDictionaryPost($id){

        $params = [
            'id' => $id,
            'name' => $_POST['name'],
            'text' => $_POST['text'],
            'hard' => $_POST['hard'],
            'category' => ucfirst($_POST['category']),
        ];

        // Получение слова и его перевода и введения из в одну переменную
        $word = $this->translate();

        $params = $this->quest($word, $params);

        $params_p = $this->paramsMake($params);

        // Разделения элементов массива в одну строку через запятую
        $column = implode(", ", array_keys($params_p));


        $edit = $this->db->query('UPDATE '.$this->table.' SET '. $column .' WHERE id = :id', $params);
        return $edit;
    }

    // Listening post
    public function addListeningPost(){

        $word = $this->lead();

        $params = $this->quiz();

        $params['hard'] = $_POST['hard'];
        $params['name'] = $_POST['name'];
        $params['category'] = ucfirst($_POST['category']);

        $cAr = $this->rowAndColumn($params, $word);
        extract($cAr);

        $add = $this->db->query('INSERT INTO '.$this->table.' ('.$column.') VALUES ('.$row.')', $params);
        //debug($add);
        return $this->db->lastInsertId();
    }

    public function editListeningPost($id){
        $params = $this->quiz();

        //debug($_POST);
        $params['id'] = $id;
        $params['hard'] = $_POST['hard'];
        $params['name'] = $_POST['name'];
        $params['category'] = ucfirst($_POST['category']);

        $word = $this->lead();

        $params = $this->quest($word, $params);

        $params_p = $this->paramsMake($params);

        $column = implode(", ", array_keys($params_p));

        $edit = $this->db->query('UPDATE '.$this->table.' SET '.$column.' WHERE id = :id', $params);

        return $edit;
    }


    // Videos post
    public function addVideosPost(){

        $word = $this->lead();

        $params = [
            'hard' => $_POST['hard'],
            'name' => $_POST['name'],
            'link' => $_POST['link'],
            'img_u' => $_POST['img_u'],
            'category' => ucfirst($_POST['category']),
        ];

        $cAr = $this->rowAndColumn($params, $word);
        extract($cAr);

        $add = $this->db->query('INSERT INTO '.$this->table.' (hard, name, link, img_u, category, '.$column.') VALUES ('.$row.')', $params);
        return $this->db->lastInsertId();
    }

    public function editVideosPost($id){

        $params = [
            'id' => $id,
            'hard' => $_POST['hard'],
            'name' => $_POST['name'],
            'link' => $_POST['link'],
            'img_u' => $_POST['img_u'],
            'category' => ucfirst($_POST['category']),
        ];

        $word = $this->lead();

        // Теже действия как в Dictionary
        $params = $this->quest($word, $params);

        $params_p = $this->paramsMake($params);

        $column = implode(", ", array_keys($params_p));

        $edit = $this->db->query('UPDATE '.$this->table.' SET '.$column.' WHERE id = :id', $params);
        return $edit;
    }



    // Audio post
    public function addAudioPost(){

        $params = [
            'name' => $_POST['name'],
            'hard' => $_POST['hard'],
            'category' => mb_strtolower($_POST['category']),
        ];
        $add = $this->db->query('INSERT INTO '.$this->table.' (name, hard, category) VALUES (:name, :category)', $params);
        return $this->db->lastInsertId();
    }

    public function editAudioPost($id){

        $params = [
            'id' => $id,
            'name' => $_POST['name'],
            'hard' => $_POST['hard'],
            'category' => mb_strtolower($_POST['category']),
        ];
        $edit = $this->db->query('UPDATE '.$this->table.' SET name = :name, hard = :hard, category = :category WHERE id = :id', $params);
        return $edit;
    }

    //Post post

    public function addPostPost(){

        $params = [
            'description' => $_POST['description'],
            'name' => $_POST['name'],
            'text' => $_POST['text'],
        ];
        $add = $this->db->query('INSERT INTO '.$this->table.' (description, name, text) VALUES (:description, :name, :text)', $params);
        return $this->db->lastInsertId();
    }

    public function editPostPost($id){
        $params = [
            'id' => $id,
            'description' => $_POST['description'],
            'name' => $_POST['name'],
            'text' => $_POST['text'],
        ];
        $edit = $this->db->query('UPDATE '.$this->table.' SET description = :description, name = :name, text = :text WHERE id = :id', $params);
        return $edit;
    }


    /*EDIT HELP METHODS*/

    private function translate(){
        // Получение слова и его перевода и введения из в одну переменную
        foreach ($_POST['word'] as $key => $value){
            foreach ($_POST['trans'] as $key_t => $val_t){
                if($key == $key_t){
                    $word['word' . $key] = $value . ' - ' . $val_t;
                }
            }
        }

        return $word;
    }

    private function rowAndColumn($params, $word){
        // Создания параметров из массива $word
        foreach ($word as $key_w => $val_w){
            $params[$key_w] = $val_w;
        }
        // Создания values из массива $params
        foreach ($params as $key_p => $val_p){
            $params_p[':' . $key_p] = $val_p;
        }
        // Разделения элементов массива в одну строку через запятую
        if($this->table == 'listening'){
            $column = implode(", ", array_keys($params));
        }else{
            $column = implode(", ", array_keys($word));
        }
        $row = implode(', ',array_keys($params_p));

        $cAr = ['column' => $column, 'row' => $row, 'params' => $params];

        return $cAr;
    }

    private function lead(){
        // Объедтнение всех частей вопроса в одну строку
        foreach ($_POST['testName'] as $key => $value){
            foreach ($_POST['first'] as $key_t => $val_t){
                if($key == $key_t){
                    $word['word' . $key] = $value . ' - ' . $val_t;
                }
            }
            foreach ($_POST['second'] as $key_t => $val_t){
                if($key == $key_t){
                    $word['word' . $key] .= ' - ' . $val_t;
                }
            }
            foreach ($_POST['third'] as $key_t => $val_t){
                if($key == $key_t){
                    $word['word' . $key] .=  ' - ' . $val_t;
                }
            }
            foreach ($_POST['test'] as $key_t => $val_t){
                if($key == $key_t){
                    $word['word' . $key] .=  ' - ' . $val_t;
                }
            }
        }

        return $word;
    }

    private function quiz(){
        // Объедтнение всех частей задания по буквам 1 в одну строку
        $quiz['aQuest'] = 'aQuest - ' . $_POST['aQuest'];
        $quiz['bQuest'] = 'bQuest - ' . $_POST['bQuest'];
        $quiz['cQuest'] = 'cQuest - ' . $_POST['cQuest'];
        $quiz['dQuest'] = 'dQuest - ' . $_POST['dQuest'];
        $quiz['eQuest'] = 'eQuest - ' . $_POST['eQuest'];
        // Объедтнение всех частей задания по буквам 2 в одну строку
        $quiz['aTest'] = 'aTest - ' . $_POST['aTest'];
        $quiz['bTest'] = 'bTest - ' . $_POST['bTest'];
        $quiz['cTest'] = 'cTest - ' . $_POST['cTest'];
        $quiz['dTest'] = 'dTest - ' . $_POST['dTest'];
        $quiz['eTest'] = 'eTest - ' . $_POST['eTest'];
        $quiz['extraTest'] = 'extraTest - ' . $_POST['extraTest'];

        $params = [
            'aQuest' => $quiz['aQuest'],
            'bQuest' => $quiz['bQuest'],
            'cQuest' => $quiz['cQuest'],
            'dQuest' => $quiz['dQuest'],
            'eQuest' => $quiz['eQuest'],
            'aTest' => $quiz['aTest'],
            'bTest' => $quiz['bTest'],
            'cTest' => $quiz['cTest'],
            'dTest' => $quiz['dTest'],
            'eTest' => $quiz['eTest'],
            'extraTest' => $quiz['extraTest'],
        ];

        return $params;
    }

    private function quest($word, $params){
        if ($this->table == 'videos' or $this->table == 'listening'){
            for($i = 1; $i < 8; $i++) {
                $word_i = "word" . $i;
                $compare = 1;
                $compare_array[] = $compare;
                $num[] = $i;
            }
        }else{
            for($i = 1; $i < 16; $i++) {
                $word_i = "word" . $i;
                $compare = 1;
                $compare_array[] = $compare;
                $num[] = $i;
            }
        }


        // Удаление из массива $word лушних числовых значений
        $array = array_diff($compare_array, $word);

        // Создание в $array группы 14 ключей для передачи туда существующийх ключей из $word и удалением несуществующих из БД
        foreach ($array as $key => $value){
            $key_up = $key + 1;
            $array['word'.  $key_up] = '';
        }

        $array = array_merge($array, $word);

        // Удаление числовых ключей из $array
        //debug($this->table);
        if ($this->table == 'videos' or $this->table == 'listening'){
            for($i = 0; $i < 7; $i++){
                unset($array[$i]);
            }
        }else{
            for($i = 0; $i < 16; $i++){
                unset($array[$i]);
            }
        }


        // Объединение $params и $array
        $params = array_merge($params, $array);

        return $params;
    }

    private function paramsMake($params){
        // Создания шаблона для SET в БД
        foreach ($params as $key_p => $val_p){
            if($key_p == 'id'){
                $key_p = '';
                $val_p = '';
            }else{
                $params_p[$key_p.' = :' . $key_p] = $val_p;
            }
        }

        return $params_p;
    }
}

