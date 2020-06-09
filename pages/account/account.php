<?php
if (!$_SESSION['user_id']) {
    redirect('/index');
}else echo renderPage('account', []);

if($_SESSION['user_id'] === 5) {
    redirect('/admin');
}


