<?php require_once(__DIR__ . "/../../partials/collectionWomen.php"); ?>


<section class="products-container">
    <?php foreach ($products as $product) : ?>
        <?php if ($product->gender === "women") : ?>
            <div class="single-product">
                <a href="">
                    <img src="<?php echo BASE_URL  . $product->getFirstImage(); ?>" alt="" class="single-product__image">
                </a>
                <p class="single-product__name"><?php echo $product->name ?></p>
                <p class="single-product__price"><?php echo $product->price ?> €</p>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</section>