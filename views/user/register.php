<?php require_once ROOT.'/template/layouts/header.php'; ?>


<section>

    <div class="container">
    
        <div class="row">
            
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if($result): ?>
                    <p>Вы зарегистрировались!</p>
                
                <?php else: ?>
                    <?php if(isset($errors) && is_array($errors)): ?>
                        <ul>

                            <?php foreach($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form">
                        <h2>Регистрация на сайте</h2>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>">
                            <input type="text" name="email" placeholder="E-Mail" value="<?php echo $email; ?>">
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>">

                            <input type="submit" name="submit" class="btn btn-default">   
                        </form>
                    </div>
                
                <?php endif; ?>
                
                <br>
                <br>
            
            </div>
        
        </div>
    </div>
    
</section>



<?php require_once ROOT.'/template/layouts/footer.php'; ?>