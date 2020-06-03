<?php

//require function and vars
require_once '../config/require.php';
requireFor('product');
session_start();
//end of require function and vars

//start of html
include_once PATH_VIEWS . 'open-html-head-body.php'; //include teg head & body


include_once PATH_VIEWS . 'header-html.php'; //include header


include_once PATH_VIEWS . 'product-block.php';

$id = (int)$_GET['id'];

$sql = "UPDATE product SET view = view + 1 WHERE id = {$id}";
mysqli_query(getConnection(), $sql);

if (!$conn = getConnection()) {
    echo "<h1>Error connect</h1>";
} else {
    $sql = "SELECT `hrefPreview`, `name`, `price`,`type`, `descriptions` FROM `product` WHERE id = {$id}";
    if ($products = queryOne($sql)) {
        $hrefPreview = $products['hrefPreview'];
        $productName = $products['name'];
        $price = $products['price'];
        $type = $products['type'];
        $descriptions = $products['descriptions'];
        renderSingleProduct($id, $hrefPreview, $productName, $price, $type, $descriptions);
    } else echo "<h1>Ошибка чтения данных</h1>";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!getConnection()) {
        var_dump($conn);
    } else {
        $name = $_POST['namePerson'];
        $comm = $_POST['comment'];
        $sql = "INSERT INTO comment (idOfProduct, namePerson, comm) 
                        VALUE ('$id', '$name', '$comm')";
        if (!$res = execute($sql)) {
            echo "<h1>Insert ERROR</h1>";
        } else {
            echo "<script>
                               document.getElementById('status').
                               insertAdjacentHTML('beforeend', 'Комментарий добавлен');
                          </script>";
        }
    }

    //добавление в корзину
    $productId = $id;
    $quantityToCart = $_POST['quantity'];
    if (!$_SESSION['user_id']) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $quantityToCart;
        } else {
            $_SESSION['cart'][$productId] = $quantityToCart;
        }
        header("Location: /product.php?id=$id");
        exit;
    } else {
        if (!$res = queryArray("SELECT 'quantity' FROM application_db.cart WHERE user = '$_SESSION[user_id]' && id_product = '$id'")) {
            $sql = "INSERT INTO application_db.cart (id_product, quantity, user)
                VALUES ('$productId', '$quantityToCart', '$_SESSION[user_id]')";
            execute($sql);
        } else {
            execute("UPDATE application_db.cart SET quantity = quantity + $quantityToCart WHERE id_product = '$id' && user = '$_SESSION[user_id]'");
        }
    }
}


include_once PATH_VIEWS . 'close-product-block.php';

include_once PATH_VIEWS . 'commentHTML.php';
renderComment($id);
include_once PATH_VIEWS . 'close-CommentHTML.php';

include_once PATH_VIEWS . 'close-product-block.php';


include_once PATH_VIEWS . 'open-html-head-body.php';
//end of html
