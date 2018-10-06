
<?php
  header("Content-type: text/html; charset=utf-8");
  define("ROOT_DIR", __DIR__ . "/../");
  define("ENGINE_DIR", __DIR__ . "/../engine/");
  define("TEMPLATES_DIR", __DIR__ . "/../templates/");
  include ENGINE_DIR .'db.php';
?>
<div>
<p>Содержимое корзины:</p>

<?php
include TEMPLATES_DIR .'cart.php';
?>
<form action="/engine/writeToMysql.php">
  <p>Введите ФИО и телефон</p>
  <input type="buyerName" name = 'buyerName' value = "John Doe">
  <input type="submit">
</form>


</div>