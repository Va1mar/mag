<?php require_once ROOT.'/template/layouts/header_admin.php'; ?>


<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <ol class="breadcrumb">
                    <li><a href="/admin/">Админ-панель</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li class="active">Просмотр заказа</li>
                </ol>

                <h3>Просмотр заказа #<?php echo $order['id']; ?></h3>

                <p>Информация о заказе: </p>
                <p>Номер заказа: <?php echo $order['id']; ?></p>
                <p>Имя заказчика: <?php echo $order['user_name']; ?></p>
                <p>Телефон: <?php echo $order['user_phone']; ?></p>
                <p>Комментарии: <?php echo $order['user_commentaries']; ?></p>
                <p>ID пользователя: <?php echo $order['user_id']; ?></p>
                <p>Дата заказа: <?php echo $order['date']; ?></p>


                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID Товара</th>
                        <th>Название товара</th>
                        <th>Код товара</th>
                        <th>Цена</th>
                        <th>Количество</th>
                    </tr>

                    <?php foreach($products as $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['code']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $products_array[$product['id']]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            
            </div>
    </div>
</div>

</section>

<?php require_once ROOT.'/template/layouts/footer_admin.php'; ?>