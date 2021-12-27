<?php
function addProductToCart(int $userId,int $productId){
    // sql: spalten-namen als variablen zb :userId
    $sql = "INSERT INTO cart 
    SET cust_id = :userId,product_id = :productId,qty = 1
    ";
    $statement = openDB()->prepare($sql);   // eintrag vorbereiten
    $statement->execute([                   // und ausführen
        ':userId'=>$userId,
        ':productId'=>$productId
    ]);    
}

function countProductsInCart(int $userId){
    $sql ="SELECT COUNT(product_id) 
        FROM cart 
        WHERE cust_id =".$userId." AND bought is NULL";
    $cartResults = openDB()->query($sql);
    if($cartResults === false){
        var_dump(printDBErrorMessage());
        return 0;
    }
    $cartItems = $cartResults->fetchColumn();  
    return $cartItems;  
}

function getCartItemsForUserId(int $userId):array{
    $sql = "SELECT product_id, product, price, image, SUM(qty) as qty, SUM(qty)*price as sum
            FROM cart
            JOIN products ON(cart.product_id = id)
            WHERE cust_id = $userId AND bought is NULL
            GROUP BY id
            ";
    $results = openDB()->query($sql);
    if($results === false){
        return [];
    }
    $found = [];
    while($row = $results->fetch()){
        $found[]=$row;
    }
    return $found;
}

function getPrevOrdItemForUserId(int $userId, $date):array{
    $eins = $date;
    $zwei = strval(strtotime($date));
    
    $sql = "SELECT  SUM(qty) AS qty, image, product
            FROM cart
            JOIN products ON(cart.product_id = id)
            WHERE STRCMP(UNIX_TIMESTAMP(cart.bought), $zwei) = 0 AND $userId = cust_id
            GROUP BY product_id
            ";
    
    // $sql = "SELECT STRCMP(cart.bought, $date) as datum, cart.bought as qty, $date as product from cart";        
    $results = openDB()->query($sql);
    if($results === false){
        return [];
    }
    $found = [];
    while($row = $results->fetch()){
        $found[]=$row;
    }
    return $found;
}

function getPrevOrdDateForUserId(int $userId):array{
    $sql = "SELECT bought
            FROM cart
            WHERE cust_id = $userId AND bought IS NOT NULL
            GROUP BY bought
            ";
    $results = openDB()->query($sql);
    if($results === false){
        return [];
    }
    $found = [];
    while($row = $results->fetch()){
        $found[]=$row;
    }
    return $found;
}

function getCartSumForUserId(int $userId): float{
    $sql = "SELECT SUM(qty*price)
    FROM cart
    JOIN products ON(cart.product_id = id)
    WHERE cust_id = $userId AND bought is NULL";
    $result = openDB()->query($sql);
    if($result === false){
        return 0;
    }
    return (float)$result->fetchColumn();
}

function moveCartProductsToLoggedinUser(int $sourceUserId,int $targetUserId):int{
    $sql="UPDATE cart
          SET cust_id=:targetUserId
          WHERE cust_id=:sourceUserId AND bought IS NULL";
    
    $statement = openDB()->prepare($sql);
    if(false === $statement){
        return 0;
    }

    return $statement->execute(
        [
            ':targetUserId'=>$targetUserId,
            ':sourceUserId'=>$sourceUserId
        ]
        );
}

function buyCartProducts(int $userId){
    $sql="UPDATE cart
          SET bought=NOW()
          WHERE bought IS NULL AND cust_id=$userId";
    
    $results = openDB()->query($sql);
}