<?php require_once ROOT.'/template/layouts/header_admin.php'; ?>


<section>

    <div class="container">
        <div class="row">
            

                <ol class="breadcrumb">
                    <li><a href="/admin/">Админ-панель</a></li>
                    <li><a href="/admin/product/">Управление товарами</a></li>
                    <li class="active">Добавление товара</li>
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
                <h3>Форма добавления товара</h3>
                
                <div class="login-form">
                    <form name="createProduct" method="post" enctype="multipart/form-data">
                        <p>
                            Название товара: <br>
                            <input type="text" name="name">

                        </p>
                        
                        <p>
                            Артикул: <br>
                            <input type="text" name="code">

                        </p>
                        
                        <p>
                            Цена: <br>
                            <input type="text" name="price">

                        </p>
                        
                        <p>
                            Категория товара: 
                            <select name="category">
                                <?php foreach($categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        
                        </p>
                        
                        
                        <p>
                            Описание товара: <br>   
                            <textarea name="description"></textarea>
                        </p>
                        
                        <p>
                            Производитель:
                            <input type="text" name="brand">
                        </p>
                        
                        <p>
                            Выбрать изображение: 
                            <input type="file" name="image">
                        </p>
                        
                        <p>
                            Доступность:<br>
                            <select name="availability">
                                <option value="1" selected>Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </p>
                        
                        <p>
                            Рекомендуемый:<br>
                            <select name="is_recommended">
                                <option value="1" selected>Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </p>
                        
                        <p>
                            Новый:<br>
                            <select name="is_new">
                                <option value="1" selected>Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </p>
                        
                        <p>
                            Статус:<br>
                            <select name="status">
                                <option value="1" selected>Показывать</option>
                                <option value="0">Не показывать</option>
                            </select>
                        </p>
                        
                        <p>
                            <input type="submit" name="create" value="Добавить">
                        </p>
                        
                    </form>
                </div>
                
            
            </div>
            
            
        </div>
    </div>

</section>


<?php require_once ROOT.'/template/layouts/footer_admin.php'; ?>