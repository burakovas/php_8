<html>
<head>
<title>catalog</title>
</head>
<body>

<?php
// 2. Создать функционал управления товарами.

header("Content-type: text/html; charset=utf-8");
define("ROOT_DIR", __DIR__ . "/../");
define("ENGINE_DIR", __DIR__ . "/../engine/");
define("TEMPLATES_DIR", __DIR__ . "/../templates/");

include ENGINE_DIR .'db.php';

session_start();
if(!$user_id = $_SESSION['user_id']){
  header("Location: /public/login.php");
}

if($id=isset($_GET['id'])){
  $id = $_GET['id'];
  $oper = $_GET['oper'];
  switch ($oper){
    case "addToCart":
      $sql="INSERT INTO cart (tovId, tovkol) VALUES ('$id', 1);";
      execute($sql);
      break;
    case "delFromCart":
      $sql="DELETE FROM cart WHERE tovId = '$id';";
      execute($sql);
      break;
    }
  }
?>
<style>
    .main-block {
      margin: 0 auto;
      border: 1px solid black;
      display: flex;
      justify-content: space-between;
    }
    .myCart {
      width: 30%;
    }
</style>

<div class="main-block">
  <?php
  include TEMPLATES_DIR .'catalog.php';
  include TEMPLATES_DIR .'cart.php';
  ?>
 <a href = "/public/checkout.php">ОФОРМИТЬ ЗАКАЗ</a>
</div>
<a href = "/public/admin.php">ИЗМЕНИТЬ КАТАЛОГ</a>
<?php
closeConnection()
?>
</body>
</html>
