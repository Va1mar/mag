<?php require_once ROOT.'/template/layouts/header_admin.php'; ?>


<section>

    <div class="container">
        <div class="row">
            

                <ol class="breadcrumb">
                    <li><a href="/admin/">Админ-панель</a></li>
                    <li><a href="/admin/category/">Управление категориями</a></li>
                    <li class="active">Редактирование категории</li>
                </ol>
 
            <br>
            
            <?php if(isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach($errors as $error): ?>
                        <li>- <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            
            <div class="col-lg-4">
                <h3>Форма редактирования категории "<?php echo $category['name']; ?>"</h3>
                
                <div class="login-form">
                    <form name="updateCategory" method="post">
                        <p>
                            Название категории: <br>
                            <input type="text" name="name" value="<?php echo $category['name']; ?>">

                        </p>
                        
                        <p>
                            Порядковый номер категории:
                            <input type="text" name="sort_order" value="<?php echo $category['sort_order']; ?>">
                        </p>
                        
                        <p>
                            Отображается
                            <select name="status">
                                <option value="1" <?php if($category['status']) echo 'selected'; ?>>Да</option>
                                <option value="0" <?php if(!category['status']) echo 'selected'; ?>>Нет</option>
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