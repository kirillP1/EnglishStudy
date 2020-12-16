<?php


namespace application\models;

use application\core\Model;
class Main extends Model
{
    public function __construct($route)
    {
        parent::__construct();

        if(isset($route['table'])) {
            $this->table = $route['table'];
        }


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

    public function checkAnswer($data, $post){


        if($data['hard'] == 'easy'){
            $hard = 1;
        }elseif($data['hard'] == 'med'){
            $hard = 2;
        }elseif($data['hard'] == 'hard'){
            $hard = 3;
        }
        //debug($hard);

        if(isset($data['aTest'])){
            $part_one = explode(' - ',$data['aQuest']);
            if(!empty($part_one[1])){
                $experience = 0;
                $letters = ['a', 'b', 'c', 'd', 'e'];
                for($i = 0; $i < count($letters); $i++){
                    $word_part  = explode(" - ", $data[$letters[$i] . 'Quest']);
                    //debug($post[$word_part[0]]);
                    if($post[$word_part[0]] == $word_part[0]){
                        $experience = $experience + (1 * $hard);
                    }
                }
                //debug($experience);
                $params = [
                    'id' => $_SESSION['account']['id'],
                    'experience' => $experience,
                ];
                $this->db->query('UPDATE accounts SET experience = experience + :experience WHERE id = :id', $params);
            }
        }


        if(isset($data['aTest'])){
            $part_two = explode(' - ',$data['aTest']);
            if(!empty($part_two[1])){
                $experience = 0;
                $letters = ['a', 'b', 'c', 'd', 'e', 'extra'];
                for($i = 0; $i < count($letters); $i++){
                    $word_part  = explode(" - ", $data[$letters[$i] . 'Test']);
                    if($_POST[$word_part[0]] == $word_part[0]){
                        $experience = $experience + (1 * $hard);
                    }
                }

                $params = [
                    'id' => $_SESSION['account']['id'],
                    'experience' => $experience,
                ];
                $this->db->query('UPDATE accounts SET experience = experience + :experience WHERE id = :id', $params);
            }
        }



        $experience = 0;
        for($i = 1; $i < 8; $i++){
            if(!empty($data['word' . $i])){
                $word_part  = explode(" - ", $data['word' . $i]);
                if($_POST['test'][$i] == $word_part[4]){
                    $experience = $experience + (1 * $hard);
                }
            }
        }
        $params = [
            'id' => $_SESSION['account']['id'],
            'experience' => $experience,
        ];
        $this->db->query('UPDATE accounts SET experience = experience + :experience WHERE id = :id', $params);
    }


}