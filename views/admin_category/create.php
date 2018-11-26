<?php require_once ROOT.'/template/layouts/header_admin.php'; ?>

<section>

    <div class="container">
    
        <div class="row">
        
            <ol class="breadcrumb">
            
                <li><a href="/admin/">Админ-панель</a></li>
                <li><a href="/admin/category">Управление категориями</a></li>
                <li class="active">Добавление категории</li>
            </ol>
            
            <div class="col-lg-4">
                <h3>Форма добавления категории</h3>
                
                
                <div class="login-form">
                    
                    <ul>
                        <?php if(isset($errors) && is_array($errors)): ?>
                            <?php foreach($errors as $error): ?>
                                <li>- <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    
                    <form method="post" name="createCategory">
                        
                        <p>
                            Введите название категории<br>
                            <input type="text" name="name">
                        </p>
                        
                        <p>
                            Порядковый номер категории<br>
                            <input type="text" name="sort_order">
                        </p>
                        
                        <p>
                            Отображается
                            <select name="status">
                                <option value="1" selected>Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </p>
                        
                        <p>
                            <input type="submit" name="submit" value="Добавить">
                        </p>
                        
                    </form>
                    
                </div>
             
            </div>
            
            
        </div>
    
    </div>

</section>


<?php require_once ROOT.'/template/layouts/footer_admin.php'; ?>