<?php

return array(
    
    /* Управление товарами */
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/category/([0-9]+)' => 'adminProduct/category/$1',
    'admin/product/create' => 'adminProduct/create',
    'admin/product' => 'adminProduct/index',
    
    /* Управление категориями */
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/create' => 'adminCategory/create',
    'admin/category' => 'adminCategory/index',
    
    /* Управление заказами */
    
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    
    
    'product/([0-9]+)' => 'product/view/$1',
    
    'catalog' => 'catalog/index',
    
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',
    
    'cabinet/edit' => 'cabinet/edit',
    'cabinet/orders' => 'cabinet/orders',
    'cabinet' => 'cabinet/index',
    
    
    'cart/checkout' => 'cart/checkout',
    'cart/addAjax/([0-9]+)' => 'cart/AddAjax/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    
    'cart' => 'cart/index',
    
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    
    'admin' => 'admin/index',
    '([a-zA-Z]+)' => 'site/index',
    '' => 'site/index'

);