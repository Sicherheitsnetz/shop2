<?php

function openDB(){
    static $pdo;
    if($pdo instanceof PDO){
        return $pdo;
    }
    require_once CONFIG_DIR.'/database.php';
    $dsn = sprintf("mysql:host=%s;dbname=%s",DB_HOST,DB_DATABASE);
    $pdo = new PDO($dsn,DB_USER,DB_PASSWORD);
    return $pdo;
}

function printDBErrorMessage(){
    $info = openDB()->errorInfo();
    if(isset($info[2])){
        return $info[2];
    }
    return '';
}