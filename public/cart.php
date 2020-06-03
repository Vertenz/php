<?php
require_once '../config/require.php';
requireFor('cart');
session_start();
include_once PATH_VIEWS . 'open-html-head-body.php'; //include teg head & body

include_once PATH_VIEWS . 'header-html.php'; //include header

$user = $_SESSION['user_id'];

$sql = "SELECT `id_product`, `quantity` FROM `cart` WHERE user = '$_SESSION[user_id]'";
if ($result = queryArray($sql)) {
    foreach ($result as $element) {
        $id = $element['id_product'];
        $productName = queryOne("SELECT `name` FROM `product` WHERE id = $element[id_product]")['name'];
        $quantity = $element['quantity'];
        include PATH_VIEWS . 'cartPage.php';
    }
}else echo "<h1>Корзина пуста</h1>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $deleteId = $_POST['del'];
    $res = queryOne("SELECT `quantity` FROM application_db.cart WHERE id_product = '$deleteId'")['quantity'];
    if ($res <= 1) {
        mysqli_query(getConnection(), "DELETE FROM application_db.cart WHERE id_product = '$deleteId'");
    } else {
        execute("UPDATE application_db.cart SET quantity = quantity - 1  WHERE id_product = '$deleteId' && user = '$_SESSION[user_id]'");
    }
    header("Location: /cart.php");
    exit;
}


include_once PATH_VIEWS . 'close-html-body.php';
