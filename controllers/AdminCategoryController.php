<?php

require_once ROOT.'/controllers/AdminBase.php';

class AdminCategoryController extends AdminBase {
    
    public function actionIndex() {
        
        $categories = Category::getCategoriesList();
        
        require_once ROOT.'/views/admin_category/index.php';
    }
    
    public function actionDelete($id) {
        
        $category = Category::getCategoryById($id);
        
        if(isset($_POST['cancel']))
            header('Location: /admin/category');
        
        if(isset($_POST['submit'])) {
            
            $result = Category::deleteCategoryById($id);
            if($result)
                header('Location: /admin/category');
        }
        
        
        
        require_once ROOT.'/views/admin_category/delete.php';
    }
    
    public function actionUpdate($id) {
        
        $category = Category::getCategoryById($id);
        
        if(isset($_POST['update'])) {
            
            $errors = false;
            
            
            if(empty($_POST['name']))
                $errors[] = 'Введите имя категории';
            
            if(empty($_POST['sort_order']))
                $errors[] = 'Введите порядковый категории';
            if($errors == false) {
                
                $options = array('id' => $id,'name' => $_POST['name'], 
                                 'sort_order' => $_POST['sort_order'], 'status' => $_POST['status']);

                $result = Category::updateCategory($options);
                header('Location: /admin/category');   
                
            }
            
            
        }
        
        require_once ROOT.'/views/admin_category/update.php';
    }
    
    public function actionCreate() {
        
        if(isset($_POST['submit'])) {
            
            $errors = false;
            
            $options = array();
            
            if(empty($_POST['name']))
                $errors[] = 'Введите название категории';
            
            if(empty($_POST['sort_order']))
                $errors[] = 'Введите порядковый номер категории';
            
            if(!$errors) {
                
                $options['name'] = $_POST['name'];
                $options['sort_order'] = $_POST['sort_order'];
                $options['status'] = $_POST['status'];
                
                Category::addCategory($options);
                
                header('Location: /admin/category');
            }
        }
        
        require_once ROOT.'/views/admin_category/create.php';
    }
}

?>