<?php

function getAllProducts(){
    $sql ="SELECT image, id, product, price
    FROM products";
    $result = openDB()->query($sql);    
    if(!$result){
        return [];
    }
    $products = [];
    while($row = $result->fetch()){
        $products[]=$row;
    }
    return $products;
}