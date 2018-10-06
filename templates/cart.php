  <?php
  $sql = "SELECT tovId, SUM(tovkol) AS koll FROM cart GROUP BY tovId;";
  $data = queryAll($sql);

  ?>

  <div class="myCart" >
    <?php foreach ($data as $product): ?>
      <?php 
      $tempId = $product['tovId'];
      $sql = "SELECT id, name FROM catalog WHERE id = '$tempId';";
      $prodName = queryOne($sql);
      ?>
      <p><?= $prodName['name'] ?><span> = <?= $product['koll'] ?></span><a href="/public/index.php?id=<?=$product['tovId']?>&oper=delFromCart"> УДАЛИТЬ ИЗ КОРЗИНЫ</a></p>
    <?php endforeach; ?>
  </div>
