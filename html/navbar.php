<HTML>
<HEAD>

<TITLE> Webshop </TITLE>
<!--<BODY>-->
<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>       

</HEAD>


    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark"> <!-- fixed-top" -->
		<div class="container">
		<a class="navbar-brand">Hi, <?=$userId ?></a><br>
		<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
		    <li class="nav-item">
				<?php if(isLoggedIn()):?>
		    		<a class="nav-link" href="/shop/index.php/logout">Logout</a>
				<?php endif;?>
				<?php if(!isLoggedIn()):?>
		    		<a class="nav-link" href="/shop/index.php/login">Login</a>
				<?php endif;?>
		    </li>
		</ul>
		</div>
		<ul class="navbar-nav mr-auto">
		    <li class="nav-item">
		    <a class="nav-link" href="/shop/index.php">Home</a>
   		    </li>
 		    <li class="nav-item">
		    <a class="nav-link" href="/shop/index.php/prevord">Previous Orders</a>
		    </li>
		    <li class="nav-item active">
		    <a class="nav-link" href="/shop/index.php/cart">Cart (<?=$CountCartItems ?>)</a>
	        </li>
		</ul>
 		</div>
		</nav>
    </header>