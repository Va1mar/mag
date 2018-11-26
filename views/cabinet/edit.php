<?php require_once ROOT.'/template/layouts/header.php'; ?>

<section>
    
    <div class="container">
        <div class="row">
        
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if($result): ?>
                    <p>Данные отредактированы</p>
                <?php else: ?>
                    <?php if(isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach($errors as $error): ?>
                                <li> - <?php $error; ?></li>
                            <?php endforeach; ?>
                            
                        </ul>
                    <?php endif; ?>
                
                    <div class="signup-form">

                        <h2>Редактирование данных</h2>

                        <form action="#" method="post" name="userEdit">

                            <p><input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"></p>
                            <p><input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"></p>

                            <p><input type="submit" name="submit" class="btn btn-default" value="Отредактировать"></p>
                        </form>
                    </div>
                
                <?php endif; ?>
                
            </div>
        </div>
        
    </div>

</section>

<?php require_once ROOT.'/template/layouts/footer.php'; ?>