<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_SESSION['user_id'] == 6) {
        $number = $_POST['id'];
            deleteOrder($number);
    }else {
        redirect('/account');
    }
};