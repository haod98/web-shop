<section>
    <div class="product-and-add">
        <div class="product-detail-container">
            <div class="stage-container">
                <img src="<?php


                            echo BASE_URL . $product->getFirstImage() ?>" alt="" class="stage-container__image">
            </div>
            <div class="gallery-container">
                <?php foreach ($product->getImages() as $images) : ?>
                    <div>
                        <img src="<?php echo BASE_URL . $images; ?>" alt="" class="gallery-container__image">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="product-action">
            <h2><?php echo $product->name ?></h2>
            <p><?php echo $product->price ?> €</p>
            <p><?php echo $product->description ?></p>
            <?php if (!\App\Models\User::isLoggedIn()) : ?>
                <a href="<?php echo BASE_URL . "/login" ?>">Please login to add to basket</a>
            <?php endif; ?>
            <?php if (\Core\Middlewares\AuthMiddleware::isLoggedIn()) : ?>
                <a href="<?php echo BASE_URL . "/products/$product->id/add-to-cart" ?>">Add to cart</a>
            <?php endif; ?>
        </div>
    </div>
</section>