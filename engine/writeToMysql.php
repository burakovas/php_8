<?php

header("Content-type: text/html; charset=utf-8");
define("ROOT_DIR", __DIR__ . "/../");
define("ENGINE_DIR", __DIR__ . "/../engine/");
define("TEMPLATES_DIR", __DIR__ . "/../templates/");

include ENGINE_DIR .'db.php';
$name = $_GET['buyerName']; //получаем имя покупателя


// добавление покупателя в таблицу
$sql = "INSERT INTO buyers (name) VALUES ('$name');";
execute($sql);

// получение id нового покупателя
$newUserId = "SELECT id, name FROM buyers WHERE name = ('$name');";
$newId = queryOne($newUserId);
$idd = $newId['id'];

// добавление корзины в таблицу заказ-покупатель - статус заказа 0-новый 
$sql = "INSERT INTO orders (buyer_id, tov_id, tov_kol) SELECT '$idd', tovId, SUM(tovkol) FROM cart GROUP BY tovId;";
execute($sql);

// очистка корзины
$sql = "DELETE FROM cart;";
execute($sql);

echo "Заказ принят!"
?>

<a href = "/public/index.php">ПРОДОЛЖИТЬ ПОКУПКИ</a>