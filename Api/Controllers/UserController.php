<?php

class UserController{

    public static function connexion($username, $password,$database){
        $stmt = $database->prepare("SELECT * FROM users WHERE UserName = ? and Password = ?");
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch();
        if($user){
            return $user;
        }else{
            return null;
        }
    }
}
