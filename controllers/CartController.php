<?php

class CartController {
    
    
    // Добавление товара в корзину
    public function actionAdd($id) {
        
        Cart::addProduct($id);
        
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }
    
    // Добавление товара Ajax
    public function actionAddAjax($id) {

        echo Cart::addProduct($id, $_POST['count']);
        
    }
    
    // Удаление товара из корзины
    public function actionDelete($id) {
        
        Cart::deleteProduct($id);
        
        $info = array('total_price' => '0', 'count_items' => '0');
        $productsInCart = Cart::getProducts();
        
        if($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);        
            $total_price = Cart::getTotalPrice($products);
        
            $info = array('total_price' => $total_price, 'count_items' => Cart::countItems());
        }
        
        echo json_encode($info);
        
//        header('Location: /cart/');
    }
    
    public function actionDeleteAjax($id) {
        Cart::deleteProduct($id);

    }
    
    
    // Страница корзины
    public function actionIndex() {
        
        $categories = Category::getCategoriesList();
        
        $productsInCart = false;
        
        $productsInCart = Cart::getProducts();
    
        if($productsInCart) {
            
            $productsIds = array_keys($productsInCart);
            
            $products = Product::getProductsByIds($productsIds);
            
            $total_price = Cart::getTotalPrice($products);
            
        }
        
        require_once ROOT.'/views/cart/index.php';

    }
    
    // Оформление заказа
    public function actionCheckout() {
        
        
        if(User::isGuest())
            header('Location: /user/login');
        
        $categories = Category::getCategoriesList();
        
        $result = false;
        $username = '';
        $phone_number = '';
        $commentaries = '';
                
        if(isset($_POST['submit'])) {
            
            
            
            $errors = false;
            
            $username = $_POST['name'];
            $phone_number = $_POST['phone_number'];
            $commentaries = $_POST['commentaries'];
            
            
            if(!User::checkName($username))
                $errors[] = 'Введите правильно имя';
            
            if(!User::checkPhone($phone_number))
                $errors[] = 'Неправильно введён номер телефона';
            
            if(!$errors) {
                $userId = User::checkLogged();
                $productsInCart = Cart::getProducts();
            
                $result = Order::save($username, $phone_number, $commentaries, $userId, $productsInCart);
                
                if($result) {
                    Cart::clear();
                    header('Location: /cabinet/orders');
                }
                      
            } else {
                $productsInCart = Cart::getProducts();
                $ids = array_keys($productsInCart);
                $products = Product::getProductsByIds($ids);

                $total_count = Cart::countItems();
                $total_price = Cart::getTotalPrice($products);
            }
            
            
        } else {
            
            $productsInCart = Cart::getProducts();

            
            if($productsInCart == false) {
                header("Location: /");
                
                      
            } else {
                $ids = array_keys($productsInCart);
                $products = Product::getProductsByIds($ids);
                $total_count = Cart::countItems();
                $total_price = Cart::getTotalPrice($products);
                
                if(!User::isGuest()) {
                    $user = User::getUserById(User::checkLogged());
                    $username = $user['name'];
                }
            }
            
        }
        
        
        require_once ROOT.'/views/cart/checkout.php';
    }
    
}

?>