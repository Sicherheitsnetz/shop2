<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?= $product['image']?>" alt="$product">
        <div class="card-body">
            <h5 class="card-title"><?= $product['product']?> (Ord# <?= $product['id']?>)</h5>
            <p class="card-text">€ <?= $product['price']?></p>
        </div>
        <div class="card-footer">
            <a href="index.php/cart/add/<?= $product['id']?>" class="btn btn-success btn-sm">Add to cart</a>
        </div>
        <!-- form action="insert.php" method="POST">
            <input type="hidden" name="prodID" value=<?= $product['id']?>>
            <input type="submit" name="submit" value="Add to cart">
        </form -->
</div>