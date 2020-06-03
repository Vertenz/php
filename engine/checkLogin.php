<?php
function getUserByLogin($login) {
    return  queryOne("SELECT * FROM users WHERE login = '{$login}'");
}
