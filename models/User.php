<?php

class User {
    
    public static function register($name, $email, $password) {
        $db = Db::getConnection();
        
        $sql = 'INSERT INTO `user` (`name`,`email`,`password`)'
                . ' VALUES(:name, :email, :password);';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function checkName($name) {
        if(strlen($name) > 2)
            return true;
        return false;
    }
    
    public static function checkPassword($password) {
        if(strlen($password) >= 6)
            return true;
        return false;
    }
    
    public static function checkEmail($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
            return true;
        return false;
    }
    
    public static function checkPhone($number) {
        if(strlen($number) == 11)
            return true;
        return false;
    }
    
    public static function checkEmailExists($email) {
        
        $sql = 'SELECT COUNT(*) FROM `user` WHERE `email` = :email;';
        
        $db = Db::getConnection();
        
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        
        if($result->fetchColumn())
            return true;
        return false;
    }

    public static function checkUserData($email, $password) {
        
        $db = Db::getConnection();
        
        $sql = 'SELECT * FROM `user` WHERE `email` = :email AND `password` = :password;';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        
        $user = $result->fetch();
        
        if($user)
            return $user['id'];
        
        return false;   
    }
    
    public static function auth($userId) {
        $_SESSION['user'] = $userId;
    }
    
    public static function checkLogged() {
        if(isset($_SESSION['user']))
            return $_SESSION['user'];
        return false;
    }
    
    public static function isGuest() {
        if(isset($_SESSION['user']))
            return false;
        return true;
    }
    
    public static function isAdmin() {
        $id = self::checkLogged();
        if($id) {
            $user = self::getUserById($id);
            if($user['role'] == 'admin')
                return true;
        }
        return false;
    }
    
    public static function getUserById($userId) {
        
        $db = Db::getConnection();
        
        $sql = 'SELECT * FROM `user` WHERE `id` = :userId;';
        
        $result = $db->prepare($sql);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        
        $result->execute();
        $row = $result->fetch();
        
        return $row;
    }
    
    public static function edit($userId, $name, $password) {
        
        $db = Db::getConnection();
        $sql = 'UPDATE `user`'
                . ' SET `name` = :name,'
                . ' `password` = :password'
                . ' WHERE `id` = :userId';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        
        return $result->execute();

    }
}


?>