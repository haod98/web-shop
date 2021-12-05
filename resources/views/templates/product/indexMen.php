<?php require_once(__DIR__ . "/../../partials/collectionMen.php"); ?>
<section class="products-container">
    <?php foreach ($products as $product) : ?>
        <?php if ($product->gender === "men") : ?>
            <div class="single-product">
                <a href="<?php echo BASE_URL . "/products/details/$product->id" ?>">
                    <img src="<?php echo BASE_URL  . $product->getFirstImage(); ?>" alt="" class="single-product__image">
                </a>
                <p class="single-product__name"><?php echo $product->name ?></p>
                <p class="single-product__price"><?php echo $product->price ?> €</p>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</section>