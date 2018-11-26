<?php require_once ROOT.'/template/layouts/header_admin.php'; ?>

<section>

    <div class="container">
        <div class="row">
        
            <ol class="breadcrumb">
                <li><a href="/admin/">Админ-панель</a></li>
                <li class="active">Управление <strong>заказами</strong></li>
            </ol>
            
            <h3>Список заказов</h3>
    
    <table class="table table-striped table-bordered">
                <tr>
                    <th>id</th>
                    <th>Имя заказчика</th>
                    <th>Телефон</th>
                    <th>Дата заказа</th>
                    <th>Статус</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                    <th>Просмотр</th>
                </tr>
                
                <?php foreach($orders as $order): ?>
                    <tr>
                        
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['user_name']; ?></td>
                        <td><?php echo $order['user_phone']; ?></td>

                        <td><?php echo $order['date']; ?></td>
                        <td><?php echo $order['status']; ?></td>
                        
                        
                        <td class="text-center">
                            <a href="/admin/order/update/<?php echo $order['id']; ?>">
                                <img src="/template/images/admin/update.png" width="20" height="20" title="редактировать">
                            </a>
                               
                        </td>
                        <td class="text-center">
                            
                            <a href="/admin/order/delete/<?php echo $order['id']; ?>">
                                <img src="/template/images/admin/delete.png" height="20" width="20" title="удалить">
                            </a>
                        
                        </td>
                        
                        <td class="text-center">
                            
                            <a href="/admin/order/view/<?php echo $order['id']; ?>">
                                <img src="/template/images/admin/view.png" height="20" width="20" title="просмотр заказа">
                            </a>
                        
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
    
    
    
</section>


<?php require_once ROOT.'/template/layouts/footer_admin.php'; ?>