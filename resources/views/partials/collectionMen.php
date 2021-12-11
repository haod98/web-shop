<section class="collection-overview-container">
    <h1 class="collection-overview-container__heading">Summer Collection</h1>
    <p class="collection-overview-container__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi nihil ut magnam pariatur quasi, expedita libero praesentium
        ipsa at illo error vitae quibusdam veritatis cupiditate ex! Atque ipsam voluptatem veritatis!</p>
    <?php if (\Core\Middlewares\AuthMiddleware::isAdmin()) : ?>
        <div class="add-product-container">
            <a href="<?php echo BASE_URL ?>/products" class="link-reset btn btn--add add-product-container__btn">Add product
            </a>
        </div>
    <?php endif; ?>
</section>