<?php require_once ROOT.'/template/layouts/header.php'; ?>

<section>

    <div class="container">
    
        <div class="row">
           
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">

                        <?php foreach($categories as $categoryItem): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="/category/<?php echo $categoryItem['id']; ?>">
                                        <?php echo $categoryItem['name']; ?>
                                    </a>

                                </h4>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>
            
            <div class="col-sm-4 padding-right">
                
                <?php if($result): ?>
                    <p>Заказ успешно оформлен. Ждите доставки.</p>

                <?php else: ?>
                
                    <p>Товаров в корзине: <?php echo $total_count; ?> шт. на сумму: <?php echo $total_price; ?>$</p>
                
                
                    <?php if(isset($errors) && is_array($errors)): ?>
                        <ul>
                        <?php foreach($errors as $error): ?>

                            <li>- <?php echo $error; ?></li>

                        <?php endforeach; ?>
                        </ul>

                    <?php endif; ?>
                
                <?php endif; ?>
                
                <div class="login-form">
                    <form action="#" method="post" class="">

                        <p>Ваше имя:<br><input type="text" name="name" value="<?php echo $username; ?>"></p>
                        <p>Номер телефона:<br><input type="text" name="phone_number" value="<?php echo $phone_number; ?>"></p>
                        <p>Пожелания:<br><input type="text" name="commentaries" value="<?php echo $commentaries; ?>"></p>

                        <p><input type="submit" name="submit" value="Отправить заказ"></p>

                    </form>
                </div>
            
            </div>

        </div>
    
    </div>

</section>

<?php require_once ROOT.'/template/layouts/footer.php'; ?>