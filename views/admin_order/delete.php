<?php require_once ROOT.'/template/layouts/header_admin.php'; ?>

<section>

    <div class="container">
    
        <div class="row">
        
            <ol class="breadcrumb">
                <li><a href="/admin/">Админ-панель</a></li>
                <li><a href="/admin/order">Управление заказами</a></li>
                <li class="active">Удаление заказа</li>
            </ol>
            
            <p>Вы действительно хотите удалить заказ #<?php echo $id; ?>?</p>
            
            <form method="post">
                <input type="submit" value="Удалить" name="submit" class="btn btn-danger"> 
                <input type="submit" value="Отмена" name="cancel" class="btn btn-success">
            </form>
            <br>
        </div>
        
     </div>
    
</section>

<?php require_once ROOT.'/template/layouts/footer_admin.php'; ?>