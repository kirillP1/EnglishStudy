<?php


namespace application\models;

use application\core\Model;
use Imagick;
class Account extends Model
{
    public $error;


    /********************************
     **********Чеки****************
     *****************************/

    public function validate($input, $post){
        $rules = [
            'email' => [
                'pattern' => '#^([A-z0-9_.-]{1,30}+)@([A-z0-9_.-]+)\.([A-z\.]{2,10})$#',
                'message' => 'E-mail адрес указан неверно',
            ],
            'login' => [
                'pattern' => '#^[A-z0-9]{3,15}$#',
                'message' => 'Логин указан неверно (разрешены только латинские буквы и цифры от 3 до 15 символов',
            ],
            'password' => [
                'pattern' => '#^[A-z0-9]{10,30}$#',
                'message' => 'Пароль указан неверно (разрешены только латинские буквы и цифры от 10 до 30 символов',

            ],
        ];

        foreach ($input as $val){
            if(!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])){
                $this->error = $rules[$val]['message'];
                return false;
            }
        }
        return true;
    }

    public function ckeckEmailExists($email){
        $params = [
            'email' => $email,
        ];
        $email = $this->db->column('SELECT id FROM accounts WHERE email = :email', $params);

        return $email;
    }

    public function ckeckLoginExists($login){
        $params = [
            'login' => $login,
        ];
        if($this->db->column('SELECT id FROM accounts WHERE login = :login', $params)){
            $this->error = 'Этот login уже используется';
            return false;
        };
        return true;
    }

    public function checkTokenExists($token){
        $params = [
            'token' => $token,
        ];
        return $this->db->column('SELECT id FROM accounts WHERE token = :token', $params);
    }

    public function checkData($login, $password){
        $params = [
            'login' => $login,
        ];

        $hash = $this->db->column('SELECT password FROM accounts WHERE login = :login', $params);

        if(!$hash or !password_verify($password, $hash)){
            $this->error = 'Неверный логин или пароль';
            return false;
        }
        return true;
    }

    public function checkStatus($type, $data){
        $params = [
            $type => $data,
        ];

        $status = $this->db->column('SELECT status FROM accounts WHERE '.$type.' = :'.$type, $params);

        if($status != 1){
            $this->error = 'Вы не подтвердили адрес электронной почты';
            return false;
        }else{
            return true;
        }
    }


    /********************************
     **********Функции****************
     *****************************/

    public function login($login){
        $params = [
            'login' => $login,
        ];
        $date = $this->db->row('SELECT * FROM accounts WHERE login = :login', $params);
        $_SESSION['account'] = $date[0];
    }

    public function register($post){
        $token = $this->createToken();


        $params = [
            'id' => '',
            'email' => $post['email'],
            'login' => $post['login'],
            'experience' => '',
            'password' => password_hash($post['password'], PASSWORD_BCRYPT),
            'token' => $token,
            'level' => 1,
            'status' => 0,
        ];

        $this->db->query('INSERT INTO accounts VALUES(:id, :email, :login, :password, :experience, :token, :status, :level)', $params);
        mail($post['email'], 'Register', 'Confirm: '. $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/account/confirm/' . $token);
    }


    public function createToken(){
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 30)), 0, 30);
    }


    public function activate($token){
        $params = [
            'token' => $token,
        ];
        $this->db->query('UPDATE accounts SET status = 1, token = "" WHERE token = :token', $params);

    }

    public function save($post){
        $params = [
            'id' => $_SESSION['account']['id'],
            'email' => $post['email'],
        ];
        
        if(!empty($post['password'])){
            $params['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
            $sql = ', password = :password';
        }else{
            $sql = '';
        }

        foreach ($params as $key => $value){
            $_SESSION['account'][$key] = $value;
        }

        $this->db->query('UPDATE accounts SET email = :email'.$sql.' WHERE id = :id', $params);
    }

    public function recovery($post){
        $token = $this->createToken();
        $params = [
            'email' => $post['email'],
            'token' => $token,
        ];
        $this->db->query('UPDATE accounts SET token = :token WHERE email = :email', $params);
        mail($post['email'], 'Recovery', 'Confirm: '. $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/account/reset/' . $token);
    }

    public function reset($token){
        $new_password = $this->createToken();

        $params = [
            'token' => $token,
            'password' => password_hash($new_password, PASSWORD_BCRYPT),
        ];

        $this->db->query('UPDATE accounts SET status = 1, token = "", password = :password WHERE token = :token', $params);
        return $new_password;
    }

    public function postUploadAv($files, $id, $action = []){
        $dir = 'public/materials/users';
        if(!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        if(!empty($files)){
            if(file_exists($dir . '/' . $id . '.jpg')){
                unlink($dir . '/' . $id . '.jpg');
            }
        }

        //$img = new Imagick($files);
        //$img->cropThumbnailImage(25, 25);
        //$img->setImageCompressionQuality(80);
        //$img->writeImage('/' . $dir . '/' . $id . '.jpg');

        move_uploaded_file($files, $dir . '/' . $id . '.jpg');
    }
}