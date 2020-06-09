<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $number = getOrderNumber();
    if (!$id = $_SESSION['user_id']) {
        $res = $_SESSION['cart'];
        foreach ($res as $product => $qty) {
            addToOrder($number, $product, $qty, 0);
        }

    }else {
        pushUsersOrder($number, $id);
    }
}
echo renderPage("addJson", [], false);