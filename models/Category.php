<?php

class Category {
    
    public static function getCategoriesList() {
        
        $db = Db::getConnection();
        
        $result = $db->query('SELECT * FROM `category` '
                  . 'ORDER BY `sort_order` ASC');
        
        $i = 0;
        
        $categories = array();
        
        while($row = $result->fetch()) {
            $categories[$i]['id'] = $row['id'];
            $categories[$i]['name'] = $row['name'];
            $categories[$i]['sort_order'] = $row['sort_order'];
            $categories[$i]['status'] = $row['status'];
            ++$i;
        }
            
        return $categories;
    }
    
    public static function getCategoryById($id) {
        
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `category` WHERE `id`='.$id.';';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        $result->execute();
        $category = $result->fetch();
        
        return $category;
    }
    
    public static function getCategoryNameById($id) {
        
        $db = Db::getConnection();
        $sql = 'SELECT `name` AS name FROM `category` WHERE `id` = :id;';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetchColumn();
    }
    
    public static function deleteCategoryById($id) {
        
        $db = Db::getConnection();
        $sql = 'DELETE FROM `category` WHERE `id`=:id;';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $result->execute();
    }
    
    public static function addCategory($options) {
        
        $db = Db::getConnection();
        $sql = 'INSERT INTO `category` (`name`, `sort_order`, `status`) VALUES (:name, :sort_order, :status);';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        
        return $result->execute();
    }
    
    public static function updateCategory($options) {
        
        $db = Db::getConnection();
        
        $sql = 'UPDATE `category`
                SET `name` = :name,
                    `sort_order` = :sort_order,
                    `status` = :status
                WHERE `id` = :id;
                ';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':id', $options['id'], PDO::PARAM_INT);
        
        return $result->execute();
    }
}

?>