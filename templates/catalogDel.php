<style>
    * {
        font-size: 14px;
    }
    .container {
        width: 70%;
    }
    .product {
        float: left;
        width: 100px;
        margin: 0 6px;
        height: 175px;
        border: 1px solid black;
    }
</style>
<div class="container">
    <?php 
    
    $data = queryAll("SELECT * from catalog");
    foreach ($data as $product): ?>
        
        <div class="product">
            <h1><?= $product['name'] ?></h1>
            <p><?= $product['description'] ?></p>
            <img src='/public/img/<?=$product['imageName']?>' alt='' width='50' />
            <a href="/engine/delFromCatalog.php?id=<?=$product['id']?>">УДАЛИТЬ ИЗ КАТАЛОГА</a>
        </div>
        
    <?php endforeach; ?>
    <a href = "/public/index.php">Вернуться в каталог МАГАЗИН</a>
</div>
