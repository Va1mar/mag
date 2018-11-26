<?php require_once ROOT.'/template/layouts/header_admin.php'; ?>


<section>

    <div class="container">
        <div class="row">
            

                <ol class="breadcrumb">
                    <li><a href="/admin/">Админ-панель</a></li>
                    <li class="active">Управление <strong>категориями</strong></li>
                </ol>

            
            
            <br>
            <a href="/admin/category/create" class="btn btn-default">Добавить категорию</a><br><br>
            
            <h3>Список категорий</h3>
            
            <table class="table table-striped table-bordered">
                <tr>
                    <th>id</th>
                    <th>Название</th>
                    <th>Порядковый номер</th>
                    <th>Отображается</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                
                <?php foreach($categories as $category): ?>
                    <tr>
                        
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><?php echo $category['sort_order']; ?></td>
                        <td class="text-center"><?php if($category['status']) echo "<img src='/template/images/admin/yes.jpg' width='20' height='20' title='да'>"; 
                                    else echo "<img src='/template/images/admin/no.png' width='20' height='20' title='нет'>"; 
                            ?></td>
                        <td class="text-center">
                            <a href="/admin/category/update/<?php echo $category['id']; ?>">
                                <img src="/template/images/admin/update.png" width="20" height="20" title="редактировать">
                            </a>
                               
                        </td>
                        <td class="text-center">
                            
                            <a href="/admin/category/delete/<?php echo $category['id']; ?>">
                                <img src="/template/images/admin/delete.png" height="20" width="20" title="удалить">
                            </a>
                        
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</section>


<?php require_once ROOT.'/template/layouts/footer_admin.php'; ?>