<?php
header("Content-type: text/html; charset=utf-8");
define("ENGINE_DIR", __DIR__ . "/../engine/");

include ENGINE_DIR .'db.php';
  $id = $_REQUEST['id'];
  $sqlName = "SELECT id, imageName FROM catalog WHERE id = '$id'";
  $filename = queryOne($sqlName);
  $sqlDel = "DELETE FROM catalog WHERE id = '$id';";
  execute($sqlDel);
//  УДАЛИТЬ ФАЙЛ С ДИСКА!
  unlink(__DIR__ . "/../public/img/" . $filename['imageName']);
?>

<br><br><br>
<div>
    <span>Товар удален из каталога</span><br>
    <a href = "/public/admin.php">Вернуться в каталог АДМИНА</a>
</div>


</body>
</html>
