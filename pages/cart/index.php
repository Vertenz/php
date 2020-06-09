<?php
if ($user = $_SESSION['user_id']) {
    if ($products = findeInCartByUser()) {
            echo renderPage('cartPage', ['products' => $products]);
    }else echo "<h1>Корзина пуста</h1>";
}else {
    $cart = $_SESSION['cart'];
    $products = [];
    foreach ($cart as $key => $el) {
        array_push($products, [id_product => $key, quantity => $el]);
    }
    echo renderPage('cartPage', ['products' => $products]);
};



