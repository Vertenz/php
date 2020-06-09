<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_SESSION['user_id'] == 6) {
        $number = (int)post('number');
        $status = (string)post('status');
        updateStatus($number, $status);
    }else {
        redirect('/account');
    }
    echo renderPage("addJson", [], false);
};
