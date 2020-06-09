<?php
//require function and vars
//end of require function and vars
//start of html
echo renderPage('loginHTML');

//check log in
if (!$id = $_SESSION['user_id']) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (post('check') === 'Login') {
            $login = post('login');
            $password = post('password');
            $user = getUserByLogin($login);
            if ($user && $user['password'] == getHash($password)) {
                $_SESSION['user_id'] = $user['id'];
                echo "<script>alert('Login');</script>";
                redirect("/product");
            } else {
                echo "<script>alert('Логин или пароль не верны.')</script>";
                redirect("/account/index");
            }
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
    redirect("/account/account");
}


//end of html
