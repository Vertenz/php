<?php
//TODO
// 1) Посты через другую страницу 25м
// 2) Сессия отдельно в метод
// 3) Корзина через сессию
// 4) Привести все к одной точке входа
//require function and vars
require_once '../engine/varLodaer.php';
session();
//end of require function and vars


//start of html

//render page

if (!$requestUri = preg_replace(['#^/#', "#[?].*#"], "", $_SERVER['REQUEST_URI'])) {
    $requestUri = 'product';
    $_SERVER['REQUEST_URI'];
} //go to product list

$parts = explode("/", $requestUri);
$page = $parts[0];
$action = $parts[1] ?? "index";

$scriptName = PATH_PAGES . $page . "/" . $action . ".php";


if (file_exists($scriptName)) {
   return include $scriptName;
} else {
    $url = $_SERVER['REQUEST_URI'];
    echo "Такой страницы нет! $url";
}

//end HTML