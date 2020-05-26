<?php

//require function and vars
require_once '../config/pathHolder.php';
require_once PATH_ENGINE . 'db.php';
require_once PATH_RENDER . 'renderProduct.php';
require_once PATH_RENDER . 'renderSingleProduct.php';
require_once PATH_RENDER . 'renderComment.php';
//end of require function and vars

//start of html
include_once PATH_VIEWS . 'open-html-head-body.php'; //include teg head & body



include_once PATH_VIEWS . 'header-html.php'; //include header



include_once PATH_VIEWS . 'product-block.php';

$id = (int) $_GET['id'];

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
            renderSingleProduct( $id,$hrefPreview, $productName, $price, $type, $descriptions);
    }else echo "<h1>Ошибка чтения данных</h1>";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);

            if (!getConnection()) {
                var_dump($conn);
            } else {
                $name = $_POST['namePerson'];
                $comm = $_POST['comment'];
                $sql = "INSERT INTO comment (idOfProduct, namePerson, comm) 
                        VALUE ('$id', '$name', '$comm')";
                if (!$res = execute($sql)) {
                    echo "<h1>Insert ERROR</h1>";
                    var_dump(mysqli_error($conn));
                } else {
                    echo "<script>
                               document.getElementById('status').
                               insertAdjacentHTML('beforeend', 'Комментарий добавлен');
                          </script>";
                }
            }
            header("Location: /product.php?id=$id");
            exit;
        }

include_once PATH_VIEWS . 'close-product-block.php';

include_once PATH_VIEWS . 'commentHTML.php';
renderComment($id);
include_once PATH_VIEWS . 'close-CommentHTML.php';


include_once PATH_VIEWS . 'close-product-block.php';



include_once PATH_VIEWS . 'open-html-head-body.php';
//end of html
