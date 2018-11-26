<?php

require_once ROOT.'/controllers/AdminBase.php';

class AdminOrderController extends AdminBase {
    
    public function actionIndex() {
        

        
        $orders = Order::getOrders();
        
        require_once ROOT.'/views/admin_order/index.php';
    }
    
    public function actionDelete($id) {
        

        
        if(isset($_POST['submit'])) {
            
            $is_delete = Order::deleteOrderById($id);
            
            header('Location: /admin/order');
        }
        
        if(isset($_POST['cancel']))
            header('Location: /admin/order');
           
        require_once ROOT.'/views/admin_order/delete.php';
    }
    
    
    public function actionUpdate($id) {
        
        self::checkAdmin();
        
        $order = Order::getOrderById($id);
        
        $errors = false;
        
        if(isset($_POST['update'])) {
            
            
            $options = array();
            $options['id'] = $id;
            $options['user_name'] = $_POST['user_name'];
            $options['user_phone'] = $_POST['user_phone'];
            $options['user_commentaries'] = $_POST['user_commentaries'];
            $options['user_id'] = $_POST['user_id'];
            $options['date'] = $_POST['date'];
            $options['status'] = $_POST['status'];
            
            
            $is_updated = Order::updateOrder($options);
            header('Location: /admin/order');
        }
        
        require_once ROOT.'/views/admin_order/update.php';
    }
    
    public function actionView($id) {
          
        $order = Order::getOrderById($id);
        $products_string = $order['products'];
        $products_array = json_decode($products_string, true);
        
        $ids = array_keys($products_array);
        $products = Product::getProductsByIds($ids);
        
        require_once ROOT.'/views/admin_order/view.php';
    }
}

?>