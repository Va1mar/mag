<?php require_once ROOT.'/template/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            
            <div class="col-sm-4 col-sm-offset-4 padding-right">
            
                <?php if(isset($errors) && is_array($errors)): ?>
                
                    <ul>
                        <?php foreach($errors as $error): ?>

                            <li> - <?php echo $error ?></li>

                        <?php endforeach; ?> 
                    </ul>

                <?php endif; ?>
            
                <div class="signup-form">
                    <h2>Вход</h2>
                    <form method="post" action="#">
                        <p><input type="text" name="email" placeholder="Введите E-Mail" value="<?php echo $email; ?>"></p>
                        <p><input type="text" name="password" placeholder="Введите Пароль" value="<?php echo $password; ?>"></p>
                        <p><input type="submit" name="submit" value="Войти" class="btn "></p>
                    </form>
                </div>
            
            </div>
            
            
        </div>
    </div>

</section>



<?php require_once ROOT.'/template/layouts/footer.php'; ?>