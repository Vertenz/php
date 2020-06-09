<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php if (!$requestUri = preg_replace(['#^/#', "#[?].*#"], "", $_SERVER['REQUEST_URI'])) {
        echo 'style/main.css';
    } else echo '../style/main.css' ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Shop</title>
</head>
<body>
<header class="header">
    <div class="header__left">
        <a href="/product"><h1 class="h">Shop name</h1></a>
    </div>
    <div><a href="/cart"><h2 style="color: black">Корзина</h2></a></div>
    <div class="header__right">
        <a href="/account/index"><h3 class="h">Log in</h3></a>
    </div>
</header>
<?= $content ?>
<footer>
    <a href="product"><h1>Shop name</h1></a>
</footer>

</body>
</html>