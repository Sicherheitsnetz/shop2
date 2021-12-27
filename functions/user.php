<?php
function getCurrentUserId() {
    $userId = mt_rand(1111, 9999);

    if(isset($_COOKIE['userId'])){
        $userId = (int)$_COOKIE['userId'];
    }
    if(isset($_SESSION['userId'])){
        $userId = (int)$_SESSION['userId'];
    }
    return $userId;
}

function isLoggedIn(): bool{
    return isset($_SESSION['userId']);
}

function getUserDataForUsername(string $username):array{
    $sql = "SELECT id, name, first_name, email, password
    FROM customers
    WHERE email=:username";

    $statement = openDB()->prepare($sql);
    if(false === $statement){
        return[];
    }
    $statement->execute([
        ':username'=>$username
    ]);
    if(0 === $statement->rowCount()){
        return [];
    }
    $row = $statement->fetch();
    return $row;
}