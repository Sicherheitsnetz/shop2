<HTML>
<HEAD>

<TITLE> Webshop </TITLE>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</HEAD>
<body>
<?php include __DIR__.'/navbar.php'?>

<div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">My Music Store</h1>
        <p class="col-md-8 fs-4"></p>
      </div>
    </div>

<section class ="container text-center col-4" id="loginForm">

<form action="index.php/login" method="POST">

    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <?php if($hasErrors):?>
            <div class="alert alert-danger" role="alert">
                <?php foreach($errors as $errorMessage):?>
                    <p><?= $errorMessage?></p>
                <?php endforeach?>
            </div>
        <?php endif;?>
        
    <div class="form-floating">

    
      <input type="email" class="form-control" value="<?=$username?>" name="username" id="username">
      <label for="username">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" value="<?=$password?>" name="password" id="password">
      <label for="password">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>

</form>



</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>       
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</BODY>
</HTML>