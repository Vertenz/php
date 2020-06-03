<?php

//require function and vars
require_once '../config/require.php';
requireFor('index');
session_start();
//end of require function and vars

//start of html
include_once PATH_VIEWS . 'open-html-head-body.php'; //include teg head & body

include_once PATH_VIEWS . 'header-html.php'; //include header


include_once PATH_VIEWS . 'product-block.php';
//render product list from DB


if (!$conn = getConnection()) {
    echo "<h1>Error connect</h1>";
} else {
    $sql = 'SELECT `id`, `hrefPreview`, `name`, `price`,`type`, `quantity` FROM `product`';
    if ($products = queryArray($sql)) {
    foreach ($products as $result) {
            $id = $result['id'];
            $hrefPreview = $result['hrefPreview'];
            $productName = $result['name'];
            $price = $result['price'];
            $type = $result['type'];
            $quantity = $result['quantity'];
            renderProductList($id, $hrefPreview, $productName,  $price, $type, $quantity);
    }
    }else echo "<h1>Ошибка чтения данных</h1>";
}


include_once PATH_VIEWS . 'close-product-block.php';


include_once PATH_VIEWS . 'close-html-body.php';
//end of html
