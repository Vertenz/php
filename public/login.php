<?php
//require function and vars
require_once '../config/require.php';
requireFor('login');
//end of require function and vars
//start of html
include_once PATH_VIEWS . 'open-html-head-body.php'; //include teg head & body

include_once PATH_VIEWS . 'header-html.php'; //include header

session_start();
var_dump($_SESSION['user_id']);
var_dump($_SERVER['REQUEST_METHOD']);
if (!$id = $_SESSION['user_id']) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (post('check') === 'Login') {
            $login = post('login');
            $password = post('password');
            $user = getUserByLogin($login);
            if ($user && $user['password'] == getHash($password)) {
                $_SESSION['user_id'] = $user['id'];
                echo "<script>alert('Login');</script>";
                header("Location: /account.php");
                exit;
            } else {
                echo "<script>alert('Логин или пароль не верны.')</script>";
                header("Location: /login.php");
                exit;
            }
            exit;
        } elseif ($_POST['check'] == 'Registration') {
            $login = post('login');
            $password = getHash(post('password'));
            $sql = "INSERT INTO users (login, password)
                VALUES ('$login', '$password')";
            execute($sql);
        } else {
            echo "Что-то пошло не так";
        }

    }
}else {
    header("Location: /account.php");
    exit;
}


include_once PATH_VIEWS . 'loginHTML.php';


include_once PATH_VIEWS . 'open-html-head-body.php';
//end of html
