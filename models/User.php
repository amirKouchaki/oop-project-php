<?php

namespace app\models;
use app\config\Database;

class User
{
    public int $id;
    public function __construct(
        public string $name,
        public string $username,
        public string $email,
        public string $password,
    )
    {
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
    }
    public static function attempt($credentials):void
    {
        $errors = [];
        $query = 'SELECT * FROM users WHERE email = :email LIMIT 1';
        $stmt = Database::$connection->prepare($query);
        $stmt->bindValue(':email',$credentials['email']);
        if($stmt->execute()){
            $data = $stmt->fetch();
            if(empty($data)){
                $errors['login'] = 'user not found';
            }
            else{
                if(!password_verify($credentials['password'],$data['password'])){
                    $errors['login'] = 'password is invalid';
                }
                else{

                    session_regenerate_id();
                    $_SESSION['id'] = $data[0]['id'];
                    $_SESSION['username'] = $data[0]['username'];
                    $_SESSION['email'] = $data[0]['email'];
                    $_SESSION['message'] = 'login was successful';
                }
            }
        }
        else{
            $errors['db'] = 'database problem occurred';

        }
        $_SESSION['errors'] = $errors;
    }

    public function save():void
    {
        $query = "INSERT INTO users(
                    name,
                    username,
                    email,
                    password
            )   
            VALUES (
                    :name,
                    :username,
                    :email,
                    :password
            )";
        $stmt = Database::$connection->prepare($query);
        $stmt->bindValue(':name',$this->name);
        $stmt->bindValue(':username',$this->username);
        $stmt->bindValue(':email',$this->email);
        $stmt->bindValue(':password',$this->password);
        $stmt->execute();
    }

}