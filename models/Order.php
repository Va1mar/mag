<?php

class Order {
    
    public static function save($username, $phone, $commentaries, $userId, $products) {
        
        $products = json_encode($products);
        
        $db = Db::getConnection();
        $sql = 'INSERT INTO `product_order` (`user_name`, `user_phone`, `user_commentaries`, `user_id`, `products`) '
                . ' VALUES(:username, :phone, :commentaries, :userId, :products);';

        $result = $db->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);  
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':commentaries', $commentaries, PDO::PARAM_STR);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        $result->bindParam(':products', $products, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function getOrders() {
        
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `product_order`;';
        
        $result = $db->query($sql);
        
        $orders = array();
        $i = 0;
        
        while($row = $result->fetch()) {
            $orders[$i]['id'] = $row['id'];
            $orders[$i]['user_name'] = $row['user_name'];
            $orders[$i]['user_phone'] = $row['user_phone'];
            $orders[$i]['user_commentaries'] = $row['user_commentaries'];
            $orders[$i]['user_id'] = $row['user_id'];
            $orders[$i]['date'] = $row['date'];
            $orders[$i]['status'] = $row['status'];
            $i++;
        }
        
        return $orders;
    }
    
    public static function deleteOrderById($id) {
        
        $db = Db::getConnection();
        $sql = 'DELETE FROM `product_order` WHERE `id`=:id;';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $is_delete = $result->execute();
        return $is_delete;
    }
    
    public static function getOrderById($id) {
        
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `product_order` WHERE `id`=:id;';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $result = $result->fetch();
        
        return $result;
    }
    
    public static function getOrdersByUserId($user_id) {
        
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `product_order`
                WHERE `user_id` = :user_id;';
        
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->execute();
        
        $orders = array();
        $i = 0;
        
        while($row = $result->fetch()) {
            $orders[$i]['date'] = $row['date'];
            $orders[$i]['id'] = $row['id'];
            $orders[$i]['status'] = $row['status'];
            ++$i;
        }
        
        return $orders;
    }
    
    public static function updateOrder($options) {
        
        $db = Db::getConnection();
        $sql = "UPDATE `product_order`  
                SET `user_name`= :user_name, 
                    `user_phone` = :user_phone, 
                    `user_commentaries` = :user_commentaries, 
                    `user_id` = :user_id, 
                    `date` = :date, 
                    `status` = :status 
                WHERE `id` = :id;";
        
        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $options['user_name'], PDO::PARAM_STR);
        $result->bindParam(':user_phone', $options['user_phone'], PDO::PARAM_STR);
        $result->bindParam(':user_commentaries', $options['user_commentaries'], PDO::PARAM_STR);
        $result->bindParam(':user_id', $options['user_id'], PDO::PARAM_INT);
        $result->bindParam(':date', $options['date'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':id', $options['id'], PDO::PARAM_INT);
        
        $is_updated = $result->execute();
        return $is_updated;
    }
    
    public static function getStatus($status) {
        
        switch($status) {
            case 1:
                return 'Заказ принят на рассмотрение';
            case 2:
                return 'Заказ в пути';
            case 3:
                return 'Заказ доставлен';
        }
        
        return '';
    }
}

?>