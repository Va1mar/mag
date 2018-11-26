<?php

class CabinetController {
    
    public function actionIndex() {
        $userId = User::checkLogged();
        
        $user = User::getUserById($userId);
        
        require_once ROOT.'/views/cabinet/index.php';

    }
    
    public function actionEdit() {
        $userId = User::checkLogged();
        
        $user = User::getUserById($userId);
        
        $name = $user['name'];
        $password = $user['password'];
        
        $result = false;
        
        if(isset($_POST['submit'])) {
            
            $errors = false;
            $name = $_POST['name'];
            $password = $_POST['password'];
            
            if(!User::checkName($name))
                $errors[] = 'Некорректное имя';
            
            if(!User::checkPassword($password))
                $errors[] = 'Некорректный пароль';
            
            if($errors == false)
                $result = User::edit($userId, $name, $password);
        }
    
        
        require_once ROOT.'/views/cabinet/edit.php';

    }
    
    public function actionOrders() {
        
        $user_id = User::checkLogged();
        
        $orders = Order::getOrdersByUserId($user_id);
        
        require_once ROOT.'/views/cabinet/orders.php';
    }
}

?>