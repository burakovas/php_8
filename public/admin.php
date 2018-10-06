<?php
header("Content-type: text/html; charset=utf-8");
define("ROOT_DIR", __DIR__ . "/../");
define("ENGINE_DIR", __DIR__ . "/../engine/");
define("TEMPLATES_DIR", __DIR__ . "/../templates/");
define("UPLOADS_DIR", __DIR__ . "/img/");

include ENGINE_DIR .'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if($_FILES['file']['type'] == 'image/jpeg'
  ) {
  $pName = $_REQUEST['name'];;
  $filename = UPLOADS_DIR . $_FILES['file']['name']; 
  $noPathFilename =  $_FILES['file']['name'];
  if(file_exists($filename)){
    $suniq = uniqid();
    $filename1 = substr($filename, 0, strlen($filename)-4);
    $filename2 = substr($filename, strlen($filename)-4 ,4);
    $filename = $filename1.$suniq.$filename2;

    $noPathFilename1 = substr($noPathFilename, 0, strlen($noPathFilename)-4);
    $noPathFilename2 = substr($noPathFilename, strlen($noPathFilename)-4 ,4);
    $noPathFilename = $noPathFilename1.$suniq.$noPathFilename2;
}

  move_uploaded_file($_FILES['file']['tmp_name'], $filename);

    $sqlAdd = "INSERT INTO catalog (name, imageName)
    VALUES ('$pName', '$noPathFilename')";
    execute($sqlAdd);
    
  } 
}

$data = queryAll("SELECT * from catalog");
?>

<br><br><br>
<div>
<form action="" enctype="multipart/form-data" method="post">
    <span>Выберите картинку</span><input type="file" name = 'file'><br>
    <span>Введите название товара</span><input type="name" name = 'name'><br>
    <span>Введите цену товара</span><input type="price" name = 'price'>
    <input type="submit">
</form>
</div>

<div>
  <?php include TEMPLATES_DIR .'catalogDel.php'; ?>
</div>

</body>
</html>
