<?php
$userId = getCurrentUserId();
$CountCartItems = countProductsInCart($userId);
// route statt GET
$url = $_SERVER['REQUEST_URI'];             //url die mit "add to cart" erzeugt wird
$indexPHPPosition = strpos($url, 'index.php'); //wo beginnt index.php in der url
$route = substr($url,$indexPHPPosition);    //url ab index.php in $route speichern
$route = str_replace('index.php','',$route); // index.php aus $route löschen
if(!$route){
    $products = getAllProducts();
    require __DIR__.'/html/main.php';
    exit();    
}
if(strpos($route,'/cart/add') !== false){   // wenn $route /cart/add enthält
    $routeParts = explode("/",$route);      // bilde array aus $route
    $productId = (int)$routeParts[3];       // productId ist Element 3, str -> int

    addProductToCart($userId,$productId);

    header("Location: /shop/index.php/cart");    // zurück zur startseite
    exit();
}

if(strpos($route,'/cart') !== false){
    $cartItems = getCartItemsForUserId($userId);
    $cartSum = getCartSumForUserId($userId);
    require __DIR__.'/html/cartPage.php';
    exit();
}

if(strpos($route,'/login') !== false){
    $isPost = strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
    $username = "";
    $password = "";
    $errors = [];
    $hasErrors = false;
    
    if($isPost){

        $username = filter_input(INPUT_POST,'username');
        $password = filter_input(INPUT_POST,'password');

        if(false === (bool)$username){
            $errors[]="Benutzername ist leer!";
        }
        if(false === (bool)$password){
            $errors[]="Passwort ist leer!";
        }
        $userData = getUserDataForUsername($username);
        if((bool)$username && 0 === count($userData)){
            $errors[]="Benutzername existiert nicht!";
        }
        if((bool)$password && 
        isset($userData['password']) &&
        strcmp($password,$userData['password']) !== 0){
            $errors[]="Passwort falsch! richtig ist: ".$userData['password'];
        }
        if(0 === count($errors)){
            $olduserId = $userId;
            $_SESSION['userId'] = (int)$userData['id'];
            moveCartProductsToLoggedinUser($olduserId,(int)$userData['id']);
            setcookie('userId',(int)$userData['id'],0,"/","",false,false);
            header("Location: /shop/index.php/cart");
            exit();
        }
    }
    $hasErrors = count($errors) > 0;



    require __DIR__.'/html/login.php';
    exit();
}

if(strpos($route,'/checkout') !== false){
    if(!isLoggedIn()){
        $_SESSION['redirectTarget'] = '../index.php/cart';
        header("Location: ../index.php/login");
    }
    else {
        buyCartProducts($userId);
        header("Location: ../index.php");
    }
}

if(strpos($route,'/logout') !== false){
    $_SESSION = array();
    session_destroy();
    setcookie('userId', "", time()-3600);
    unset($_COOKIE["userId"]);
    header('location: ../index.php');
    
}

if(strpos($route,'/prevord') !== false){
    $cartDates = getPrevOrdDateForUserId($userId);
    require __DIR__.'/html/prevordPage.php';
    exit();
}