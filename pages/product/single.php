<?php
//TODO 1) изменить рендер страницы по новой F
// 2) разделить методы на другие страницы
$id = (int)$_GET['id'];
$test = getProductById($id);


if (!$conn = getConnection()) {
    echo "<h1>Error connect</h1>";
} else {
    if ($product = getProductById($id)) {
        echo renderPage('singleProduct',['product' => $product]);
        renderComment($id);
    } else echo "<h1>Товар не найден</h1>";
}

//end of html
