<HTML>
<HEAD>

<TITLE> Webshop </TITLE>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</HEAD>
<body>
<?php include __DIR__.'/navbar.php'?>
<!-- header class="jumbotron">
    <div class="container">
        <h1>Willkommen im Music Store</h1>
    </div>
</header -->
<div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">My Music Store</h1>
        <p class="col-md-8 fs-4">Your shopping cart!</p>
      </div>
    </div>
<!-- img src="/pictures/musicstore.png" class="img-fluid" alt="Responsive image" -->
<section class ="container" id="cartItems">
    <?php foreach($cartItems as $cartItem):?>
    <div class="row">
        <?php include __DIR__.'/cartItem.php';?>
    </div>
    <?php endforeach;?>
    <div class="row">
        <div class="col-12 text-end">
            Summe (<?= $CountCartItems ?> Artikel): <?=$cartSum?> €
        </div>
    </div>
    <div class="row">
        <div class="col-11"></div>
        <a href="http://localhost/index.php/checkout" class="btn btn-primary col-1 ">Buy</a>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>       
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</BODY>
</HTML>