<?php require_once ROOT.'/template/layouts/header.php'; ?>

<section>
    
    <div class="container">
        <div class="row">
            <h2>Кабинет пользователя</h2>
            
            <h4>Привет, <?php echo $user['name']; ?></h4>
            
            <ul>
                <li><a href="/cabinet/edit/">Редактировать данные</a></li>
                <li><a href="/cabinet/orders">Заказы</a></li>
                <?php if(User::isAdmin()): ?>
                    <li><a href="/admin/">Админпанель</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

</section>


<?php require_once ROOT.'/template/layouts/header.php'; ?>