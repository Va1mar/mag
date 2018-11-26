<?php

class SiteController {
    
    public function actionIndex() {
        
        $categories = Category::getCategoriesList();
        
        $productsList = Product::getLatestProducts(3);
        
        $recommended = Product::getRecommendedProducts();
        
        require_once ROOT.'/views/site/index.php';
    }
} 


?>