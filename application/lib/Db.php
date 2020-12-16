<?php

namespace application\lib;

use PDO;

class Db {

    protected $db;

    // Подключение к БД с помощью класса PDO
    public function __construct() {
        $config = require 'application/config/db.php';
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['db'].'', $config['name'], $config['password']);
    }


    // Запрос в PDO
    public function query($sql, $params = []) {


        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (is_int($val)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $stmt->bindValue(':'.$key, $val, $type);
            }
        }
        //if(isset($params['id'])){
            //debug($stmt);
        //}

        $stmt->execute();
        return $stmt;
    }

    // Запрос в PDO типом row
    public function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    // Запрос в PDO типом column
    public function column($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

    // Нахождение ID последнего, добавленного поста
    public function lastInsertId() {
        return $this->db->lastInsertId();
    }

}