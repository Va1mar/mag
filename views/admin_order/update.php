<?php require_once ROOT.'/template/layouts/header_admin.php'; ?>

<section>

    <div class="container">
    
        <div class="row">
        
            <ol class="breadcrumb">
                <li><a href="/admin/">Админ-панель</a></li>
                <li><a href="/admin/order">Управление заказами</a></li>
                <li class="active">Редактирование заказа</li>
            </ol>
        
        </div>
        
            <br>
            
            <div class="col-lg-4">
                <h3>Форма редактирования заказа #<?php echo $order['id']; ?></h3>
                
                <div class="login-form">
                    <form name="updateOrder" method="post" enctype="multipart/form-data">
                        <p>
                            Имя заказчика: <br>
                            <input type="text" name="user_name" value="<?php echo $order['user_name']; ?>">
                        </p>
                        
                        <p>
                            Телефон заказчика: <br>
                            <input type="text" name="user_phone" value="<?php echo $order['user_phone']; ?>">

                        </p>
                        
                        <p>
                            Комментарии: <br>
                            <input type="text" name="user_commentaries" value="<?php echo $order['user_commentaries']; ?>">

                        </p>
                        
                        <p>
                            ID пользователя: <br>
                            <input type="text" name="user_id" value="<?php echo $order['user_id']; ?>">
                        </p>
                        
                        <p>
                            Дата заказа: <br>
                            <input type="text" name="date" value="<?php echo $order['date']; ?>">
                        </p>
                        
                        <p>
                            Статус заказа: <br>
                            <input type="text" name="status" value="<?php echo $order['status']; ?>">
                        </p>
                        
                        <p>
                            <input type="submit" name="update" value="Отредактировать">
                        </p>
                        
                    </form>
                </div>
                
            
            </div>
            
    
    </div>

</section>


<?php require_once ROOT.'/template/layouts/footer_admin.php'; ?>