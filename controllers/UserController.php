<?php

class UserController {
    
    public function actionRegister() {
        
        $name = '';
        $email = '';
        $password = '';
        $result = false;
        
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if(!User::checkName($name))
                $errors[] = 'Имя должно быть не менее 3 символов';
            
            if(!User::checkEmail($email))
                $errors[] = 'Некорректный E-Mail';
            
            if(!User::checkPassword($password))
                $errors[] = 'Пароль должен быть длиннее 6 символов';
            
            if(User::checkEmailExists($email))
                $errors[] = 'Этот E-Mail уже используется';
            
            if($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }
        
        require_once ROOT.'/views/user/register.php';
    }
    
    
    public function actionLogin() {
        
        $errors = false;
        $email = '';
        $password = '';
        
        if(isset($_POST['submit'])) {
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            if(!User::checkEmail($email)) {
                $errors[] = 'Некорректно введён E-Mail';
            }
            
            if(!User::checkPassword($password)) {
                $errors[] = 'Некорректно введён пароль';
            }
            
            $userId = User::checkUserData($email, $password);
            
            if($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                User::auth($userId);
            
                header("Location: /cabinet/");
            }
        }
        
        require_once ROOT.'/views/user/login.php';

    }
    
    public function actionLogout() {
        
        unset($_SESSION['user']);    
        header("Location: /");
        
    }
    
}

?>