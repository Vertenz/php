<?php
function session() {
    return session_start();
}

function session_set($key, $value) {
    $_SESSION[$key] = $value;
}

function end_session() {
    session_unset();
}