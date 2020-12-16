<?php


namespace application\core;

use application\lib\Db;
use application\core\Controller;
abstract class Model
{
    public $db;
    public $controller;
    public $table;

    public function __construct(){
        $this->db = new Db();
    }

    // Функция сбора кол-ва всех постов
    public function totalPost(){
        $total = $this->db->row('SELECT COUNT(*) FROM '.$this->table);
        $total = $total[0]['COUNT(*)'];

        return $total;
    }


    public function mb_ucfirst($text) {
        mb_internal_encoding("UTF-8");
        return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
    }

    public function updateExp(){
        $params = [
            'id' => $_SESSION['account']['id'],
        ];
        $exp = $this->db->column('SELECT experience FROM accounts WHERE id = :id', $params);
        $_SESSION['account']['experience'] = $exp;
    }

    public function getLevel($levels){
        //debug($levels);
        for ($i = 1; $i < count($levels) + 1; $i++){
            if($_SESSION['account']['experience'] >= $levels[$i]['min'] and $_SESSION['account']['experience'] < $levels[$i]['max']){
                $params = [
                    'id' => $_SESSION['account']['id'],
                    'level' => $i,
                ];
                $this->db->query('UPDATE accounts SET level = :level WHERE id = :id', $params);
                $_SESSION['account']['level'] = $i;
            }

        }

    }
}