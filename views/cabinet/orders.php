<?php require_once ROOT.'/template/layouts/header.php'; ?>

<section>

    <div class="container">
        <div class="row">
        
            <div class="col-lg-6">
                
                
                <table class="table">
                    <tr>
                        <th>Номер заказа</th>
                        <th>Дата заказа</th>
                        <th>Статус</th>
                    </tr>
                    
                    <?php foreach($orders as $order): ?>

                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['date']; ?></td>
                        <td>
                            
                            <?php echo Order::getStatus($order['status']); ?>
                        
                        </td>
                    </tr>

                    <?php endforeach; ?>
                    
                    
                </table>
            </div>
        
        </div>
    </div>
    
</section>

<?php require_once ROOT.'/template/layouts/footer.php'; ?>