<?php

require_once ROOT.'/controllers/AdminBase.php';

class AdminProductController extends AdminBase {
    
    
    // Action главной страницы
    
    public function actionIndex() {
        $products = Product::getProductList();
        $categories = Category::getCategoriesList();
        
        if(isset($_POST['sort'])) {
            $location = 'Location: /admin/product/category/'.$_POST['category_name'];
//            echo $location;
            header($location);
        }
        
        require_once ROOT.'/views/admin_product/index.php';
    }
    
    public function actionCategory($category_id) {
        $products = Product::getProductsInCategory($category_id);
        $categories = Category::getCategoriesList();
        
        
        if(isset($_POST['sort'])) {
            $location = 'Location: /admin/product/category/'.$_POST['category_name'];
            header($location);
        }
        
        require_once ROOT.'/views/admin_product/category.php';
    }
    
    
    // Добавление товара
    
    public function actionCreate() {
        
        $categories = Category::getCategoriesList();
        
        $errors = false;
        
        if(isset($_POST['create'])) {
            
            $options = array();
            
            if(empty($_POST['name']))
               $errors[] = 'Введите название товара';
            
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['category_id'] = $_POST['category'];
            $options['price'] = $_POST['price'];
            $options['description'] = $_POST['description'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['is_new'] = $_POST['is_new'];
            $options['status'] = $_POST['status'];
            
            if(!$errors) {
                $id = Product::createProduct($options);
                
                if($id) {
                    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
                        move_uploaded_file($_FILES['image']['tmp_name'], ROOT.'/upload/images/'.$id.'.jpg');
                }
                

                
                header('Location: /admin/product/');
                }
            }
        }
        
        require_once ROOT.'/views/admin_product/create.php';
    }
    
    public function actionUpdate($id) {
        
        $product = Product::getProductById($id);
        $categories = Category::getCategoriesList();
        
        $errors = false;
        
        if(isset($_POST['update'])) {
            
            if(empty($_POST['name']))
                $errors []= 'Необходимо ввести название товара';
            
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['category_id'] = $_POST['category'];
            $options['price'] = $_POST['price'];
            $options['description'] = $_POST['description'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['is_new'] = $_POST['is_new'];
            $options['status'] = $_POST['status'];
            $options['id'] = $id;
            
            if(!$errors) {
                
                $result = Product::updateProduct($options);
                
                if($result) {
                    if(is_uploaded_file($_FILES['image']['tmp_name']))
                        move_uploaded_file($_FILES['image']['tmp_name'], ROOT.'/upload/images/'.$id.'.jpg');
                }
                
                
                
                
                
                header('Location: /admin/product/');
            }
            
        }
        
        require_once ROOT.'/views/admin_product/update.php';
    }
    
    
    
    // Удаление товара
    
    public function actionDelete($id) {
        
        if(isset($_POST['cancel']))
            header('Location: /admin/product');
        
        if(isset($_POST['submit'])) {
            
            Product::deleteProductById($id);
            header('Location: /admin/product/');
        }
        
        require_once ROOT.'/views/admin_product/delete.php';

    }
    
}


?>