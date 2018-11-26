<?php

class Product {
    
    const SHOW_BY_DEFAULT = 3;
    
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT) {
        
        $db = Db::getConnection();
        
        $result = $db->query('SELECT `id`, `name`, `price`, `is_new` FROM `product`'
                            . ' WHERE `status`=1'
                            . ' ORDER BY `id` DESC'
                            . ' LIMIT '.$count.';'
                            );
        
        $productsList = array();
        $i = 0;
        
        while($row = $result->fetch()) {    
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
        
            ++$i;
        }
    
        return $productsList;
    }
    
    public static function getProductsInCategory($category_id) {
        
        $db = Db::getConnection();
        $sql = 'SELECT `id`, `name`, `code`, `price`
                FROM `product` 
                WHERE `category_id` = :category_id
                AND `status` = 1;';
        
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $result->execute();
        
        $i = 0;
        $products = array();
        
        while($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];    
            $products[$i]['code'] = $row['code'];
            $products[$i]['price'] = $row['price'];
            ++$i;
        }
        return $products;
    }
    
    public static function getProductsListByCategory($category_id, $page) {
        
        $db = Db::getConnection();
        
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        
        $result = $db->query('SELECT `id`, `name`, `price`, `is_new` FROM `product`'
                             . ' WHERE `status`=1 AND `category_id`='.$category_id
                             . ' ORDER BY `id` DESC'
                             . ' LIMIT '.self::SHOW_BY_DEFAULT
                             . ' OFFSET '.$offset.';'
                            );
        
        $productsList = array();
        $i = 0;
        
        while($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            
            ++$i;
        }
        
        return $productsList;
    }
    
    public static function getProductById($id) {
        
        $db = Db::getConnection();
        
        $result = $db->query('SELECT * FROM `product` WHERE `id`='.$id.';');
        
        $product = $result->fetch();
        
        return $product;
    }
    
    public static function getProductsByIds($ids) {
        
        $db = Db::getConnection();
        
        $string_ids = implode(',', $ids);
        $sql = 'SELECT * FROM `product` WHERE `status`=1 AND `id` IN('.$string_ids.');';
        
        $result = $db->query($sql);
        
        $products = array();
        $i = 0;
        
        while($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            
            $i++;
        }
        
        return $products;
    }
    
    public static function getTotalCountProductsInCategory($category_id) {
        
        $db = Db::getConnection();
        
        $result = $db->query('SELECT count(`id`) AS count FROM `product`'
                             . ' WHERE `status`=1 AND `category_id`='.$category_id.';'
                            );
        $row = $result->fetch();
        return $row['count'];
    }
    
    public static function getRecommendedProducts() {
        
        $db = Db::getConnection();
        
        $sql = 'SELECT `id`, `name`, `price` FROM `product` WHERE `status`=1 AND `is_recommended`=1;';
        
        $result = $db->query($sql);
        
        $recommended_products = array();
        $i = 0;
        
        while($row = $result->fetch()) {
            $recommended_products[$i]['id'] = $row['id'];
            $recommended_products[$i]['name'] = $row['name'];
            $recommended_products[$i]['price'] = $row['price'];
            ++$i;
        }
        
        return $recommended_products;
    }
    
    public static function getProductList() {
        
        $db = Db::getConnection();
        
        $sql = 'SELECT `id`, `name`, `code`, `price` FROM `product` WHERE `status`=1 ORDER BY `id` ASC';
        
        $result = $db->query($sql);
        $i = 0;
        
        $products = array();
        
        while($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['price'] = $row['price'];
            ++$i;    
        }
        
        return $products;
    }
    
    public static function createProduct($options) {
        $db = Db::getConnection();
        
        $sql = 'INSERT INTO `product`'
            . ' (`name`, `category_id`, `code`, `price`,'
            . ' `availability`, `brand`, `description`,' 
            . ' `is_new`, `is_recommended`, `status`)'
            . ' VALUES (:name, :category_id, :code, :price,'
            . ' :availability, :brand, :description,'
            . ' :is_new, :is_recommended, :status);';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        
        $result->execute();
        $id = $db->lastInsertId();
        
        return $id;
    }
    
    // Удаление продукта по ID
    public static function deleteProductById($id) {
        
        $db = Db::getConnection();
        
        $sql = 'DELETE FROM `product` WHERE `id`=:id;';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        
        return $result->execute();
    }
    
    public static function getImage($id) {
        
        $imagePath = '/upload/images/'.$id.'.jpg';
        
        if(file_exists($_SERVER['DOCUMENT_ROOT'].$imagePath)) {

            return $imagePath;
        }
            
        return '/upload/images/default.png';
    }
    
    public static function updateProduct($options) {
        
        $db = Db::getConnection();
        
        $sql = 'UPDATE `product`'
                . ' SET'
                . ' `name`= :name,'
                . ' `code`= :code,'
                . ' `price`= :price,'
                . ' `category_id`= :category_id,'
                . ' `description`= :description,'
                . ' `brand` = :brand,'
                . ' `availability` = :availability,'
                . ' `is_recommended` = :is_recommended,'
                . ' `is_new` = :is_new,'
                . ' `status` = :status'
                . ' WHERE `id`=:id';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_INT);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
    
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        
        $result->bindParam(':id', $options['id'], PDO::PARAM_INT);
        
        return $result->execute();
    }
}


?>