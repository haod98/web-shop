<section class="collection-overview-container">
    <h1 class="collection-overview-container__heading">Summer Collection</h1>
    <p class="collection-overview-container__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi nihil ut magnam pariatur quasi, expedita libero praesentium
        ipsa at illo error vitae quibusdam veritatis cupiditate ex! Atque ipsam voluptatem veritatis!</p>
    <?php if (\Core\Middlewares\AuthMiddleware::isAdmin()) : ?>
        <div class="add-product-container">
            <a href="<?php echo BASE_URL ?>/create/index" class="link-reset btn btn--add add-product-container__btn">Add product
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-plus-square-fill plus-icon" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                </svg>
            </a>
        </div>
    <?php endif; ?>
</section>