<?php

// change before flight
error_reporting(E_ALL);
ini_set('display_errors', 'On');

try {

    $db_ini = parse_ini_file("./db.ini");

    $type = $db_ini['type'];
    $name = $db_ini['name'];
    $host = $db_ini['host'];
    $user = $db_ini['user'];
    $pass = $db_ini['pass'];

    $db = new PDO("{$type}:dbname={$name};host={$host};charset=utf8", "{$user}", "{$pass}");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {

    echo $e->getMessage();
    die();
}

?>