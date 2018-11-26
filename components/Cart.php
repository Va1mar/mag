<?php

class Cart {
    
    public static function addProduct($id, $count) {
        
        $id = intval($id);
        $count = intval($count);
        
        $productsInCart = array();
        
        if(isset($_SESSION['products']))
            $productsInCart = $_SESSION['products'];
        
        if(array_key_exists($id, $productsInCart))
            $productsInCart[$id] += $count;
        else
            $productsInCart[$id] = $count;
        
        $_SESSION['products'] = $productsInCart;
             
        return self::countItems();
    }
    
    public static function countItems() {
        if(isset($_SESSION['products'])) {
            $count = 0;        
            foreach($_SESSION['products'] as $id => $quantity)
                $count += $quantity;
        } else {
            return 0;
        }
        
        return $count;
    }
    
    public static function getProducts() {
        if(isset($_SESSION['products']))
            return $_SESSION['products'];
        return false;
    }
    
    public static function clear() {
        if(isset($_SESSION['products']))
            unset($_SESSION['products']);
    }
    
    public static function deleteProduct($id) {
        
        if(isset($_SESSION['products'][$id]))
            unset($_SESSION['products'][$id]);
    
    }
    
    public static function getTotalPrice($products) {
        
        $productsInCart = Cart::getProducts();
        $total_price = 0;
        
            
        if($productsInCart) {
            foreach($products as $product)
                $total_price += $product['price'] * $productsInCart[$product['id']];
        }
        
        return $total_price;
    }
    
}

?>