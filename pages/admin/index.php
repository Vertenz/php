<?php
    if ($_SESSION['user_id'] == 6) {
        $orders = getAllOrder();
        echo renderPage('admin', ['orders' => $orders]);
    } else {
        redirect('/product');
    }
