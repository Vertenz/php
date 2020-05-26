<?php

require_once '../config/pathHolder.php';

function getConnection()
{

    $dbConfig = include_once PATH_CONFIG . "sql.php";
    static $conn = null;
    if (is_null($conn)) {
        $conn = mysqli_connect(
            $dbConfig['host'],
            $dbConfig['login'],
            $dbConfig['password'],
            $dbConfig['db_name']
        );
    }

    return $conn;
}

function execute(string $sql)
{
    return mysqli_query(getConnection(), $sql);
}

function queryArray($sql)
{
    return mysqli_fetch_all(execute($sql), MYSQLI_ASSOC);
}

function queryOne($sql)
{
    return queryArray($sql)[0];
}

function closeConnection()
{
    return mysqli_close(getConnection());
}

