<?php require_once ROOT.'/template/layouts/header_admin.php'; ?>


<section>

    <div class="container">
        <div class="row">
            

                <ol class="breadcrumb">
                    <li><a href="/admin/">Админ-панель</a></li>
                    <li><a href="/admin/product/">Управление товарами</a></li>
                    <li class="active">Редактирование товара</li>
                </ol>

            
            
            <br>
            
            <?php if($errors && is_array($errors)): ?>
                <ul>
                    <?php foreach($errors as $error): ?>
                        <li>- <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            
            <div class="col-lg-4">
                <h3>Форма редактирования товара #<?php echo $product['id']; ?></h3>
                
                <div class="login-form">
                    <form name="updateProduct" method="post" enctype="multipart/form-data">
                        <p>
                            Название товара: <br>
                            <input type="text" name="name" value="<?php echo $product['name']; ?>">

                        </p>
                        
                        <p>
                            Артикул: <br>
                            <input type="text" name="code" value="<?php echo $product['code']; ?>">

                        </p>
                        
                        <p>
                            Цена: <br>
                            <input type="text" name="price" value="<?php echo $product['price']; ?>">

                        </p>
                        
                        <p>
                            Категория товара: 
                            <select name="category">
                                <?php foreach($categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>" <?php if($category['id'] == $product['category_id']) echo 'selected'; ?>><?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        
                        </p>
                        
                        
                        <p>
                            Описание товара: <br>   
                            <textarea name="description">
                                <?php echo $product['description']; ?>
                            </textarea>
                        </p>
                        
                        <p>
                            Производитель:
                            <input type="text" name="brand" value="<?php echo $product['brand']; ?>">
                        </p>
                        
                        <p>
                            Выбрать изображение: 
                            <input type="file" name="image" value="">
                        </p>
                        
                        <p>
                            Доступность:<br>
                            <select name="availability">
                                <option value="1" <?php if($product['availability']) echo 'selected'; ?>>Да</option>
                                <option value="0" <?php if(!$product['availability']) echo 'selected'; ?>>Нет</option>
                            </select>
                        </p>
                        
                        <p>
                            Рекомендуемый:<br>
                            <select name="is_recommended">
                                <option value="1" <?php if($product['is_recommended']) echo 'selected'; ?>>Да</option>
                                <option value="0" <?php if(!$product['is_recommended']) echo 'selected'; ?>>Нет</option>
                            </select>
                        </p>
                        
                        <p>
                            Новый:<br>
                            <select name="is_new">
                                <option value="1" <?php if($product['is_new']) echo 'selected'; ?>>Да</option>
                                <option value="0" <?php if(!$product['is_new']) echo 'selected'; ?>>Нет</option>
                            </select>
                        </p>
                        
                        <p>
                            Статус:<br>
                            <select name="status">
                                <option value="1" <?php if($product['status']) echo 'selected'; ?>>Показывать</option>
                                <option value="0" <?php if(!$product['status']) echo 'selected'; ?>>Не показывать</option>
                            </select>
                        </p>
                        
                        <p>
                            <input type="submit" name="update" value="Отредактировать">
                        </p>
                        
                    </form>
                </div>
                
            
            </div>
            
            
        </div>
    </div>

</section>


<?php require_once ROOT.'/template/layouts/footer_admin.php'; ?>