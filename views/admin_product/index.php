<?php require_once ROOT.'/template/layouts/header_admin.php'; ?>


<section>

    <div class="container">
        <div class="row">
            

                <ol class="breadcrumb">
                    <li><a href="/admin/">Админ-панель</a></li>
                    <li class="active">Управление <strong>товарами</strong></li>
                </ol>

            
            
            <br>
            <a href="/admin/product/create" class="btn btn-success">Добавить товар</a><br><br>
            
            <div style="width:400px;">
                    <p>Показать товары категории: </p>
                    
                    <form method="post">
                        
                        <select name="category_name" style="margin-bottom: 10px;">
                            <option disabled selected>Все</option>
                            <?php foreach($categories as $category): ?>
                                <option value="<?php echo $category['id']?>">
                                    <?php echo $category['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                
                        <input type="submit" name="sort" value="Показать" class="btn btn-default"> 
                        
                    </form>    
            </div>
            
            <h3>Список товаров</h3>
            
            <table class="table table-striped table-bordered">
                <tr>
                    <th>id</th>
                    <th>Название</th>
                    <th>Код</th>
                    <th>Цена</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                
                <?php foreach($products as $product): ?>
                    <tr>
                        
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td class="text-center">
                            <a href="/admin/product/update/<?php echo $product['id']; ?>">
                                <img src="/template/images/admin/update.png" width="20" height="20" title="редактировать">
                            </a>
                               
                        </td>
                        <td class="text-center">
                            
                            <a href="/admin/product/delete/<?php echo $product['id']; ?>">
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