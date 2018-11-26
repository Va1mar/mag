<?php

class CatalogController {
    
    public static function actionIndex() {
        
        $categories = Category::getCategoriesList();
        $productsList = Product::getLatestProducts(12);
        
        require_once ROOT.'/views/catalog/index.php';
    }
    
    public static function actionCategory($category_id, $page = 1) {    
        
        $categories = Category::getCategoriesList();
        $productsList = Product::getProductsListByCategory($category_id, $page);
        
        $count = Product::getTotalCountProductsInCategory($category_id);
        
        $pagination = new Pagination($count, $page, Product::SHOW_BY_DEFAULT, 'page-');
        
        require_once ROOT.'/views/catalog/category.php';
    }
}

?>