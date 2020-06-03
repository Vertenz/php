<?php
function redirect(string $url): void
{
    header("Location: {$url}");
    exit;
}

function get($name) {
    return $_GET[$name];
}

function post($name) {
    return $_POST["$name"];
}

function getHash($string) {
    return md5($string . "d5f8");
}
