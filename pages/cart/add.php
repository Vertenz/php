<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $productId = (int)post('product_id');
    $productQty = (int)post('qty');

    if (!$id = $_SESSION['user_id']) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $productQty;
        } else {
            $_SESSION['cart'][$productId] = $productQty;
        }
    } else {
        if (!$res = findInCartById($productId)) {
            addNewInCart($productId, $productQty);
        } else {
            plusQtyInCart($productId, $productQty);
        }
    }
}
echo renderPage("addJson", [], false);

