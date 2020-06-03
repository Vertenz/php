<?php

//require function and vars
require_once '../config/require.php';
requireFor('account');
//end of require function and vars
//start of html
include_once PATH_VIEWS . 'open-html-head-body.php'; //include teg head & body
session_start();

include_once PATH_VIEWS . 'header-html.php'; //include header
if (!$_SESSION['user_id']) {
    header("Location: /login.php");
    exit;
}
echo "<h1>Account {$_SESSION['user_id']}</h1>";



include_once PATH_VIEWS . 'open-html-head-body.php';
//end of html
