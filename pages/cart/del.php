<?php
//удаление
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($user = $_SESSION['user_id']) {
        $deleteId = $_POST['del'];
        $res = queryOne("SELECT `quantity` FROM application_db.cart WHERE id_product = '$deleteId'")['quantity'];
        if ($res <= 1) {
            deleteCart($deleteId, $user);
        } else {
            execute("UPDATE application_db.cart SET quantity = quantity - 1  WHERE id_product = '$deleteId' && user = '$_SESSION[user_id]'");
        }
    }else {
        $deleteId = $_POST['del'];
        $res = $_SESSION['cart'][$deleteId];
        if ($res <= 1) {
            unset($_SESSION['cart'][$deleteId]);
        } else {
            $_SESSION['cart'][$deleteId] = $_SESSION['cart'][$deleteId] - 1;
        }
    }
}
redirect("/cart/index");