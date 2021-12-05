<nav class="navbar-container">
    <ul class="navbar-container__list">
        <li class="mobile-menu-container">
            <button class="btn">
                <svg xmlns="http://www.w3.org/2000/svg" class="navbar-container__icon  bi bi-heart" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
        </li>
        <li class="navbar-container__list--hidden">
            <a class="navbar-container__list--anchor-reset" href="<?php echo BASE_URL; ?>">Home</a>
        </li>
        <li class="navbar-container__list--hidden">
            <a class="navbar-container__list--anchor-reset" href="<?php echo BASE_URL; ?>/women">Women</a>
        </li>
        <li class="navbar-container__list--hidden">
            <a class="navbar-container__list--anchor-reset" href="<?php echo BASE_URL; ?>/men">Men</a>
        </li>
    </ul>
    <ul class="list-reset navbar-container__icon-list">
        <?php if (\Core\Middlewares\AuthMiddleware::isAdmin()) : ?>
            <li>
                <p class="text-reset greeting">
                    Admin
                </p>
            </li>
        <?php endif; ?>
        <li>
            <a class="navbar-container__list--anchor-reset" href="<?php echo BASE_URL; ?>/login">
                <!-- Login icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="navbar-container__icon bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                </svg>
            </a>
        </li>
        <li>
            <a class="navbar-container__list--anchor-reset" href="<?php echo BASE_URL . "/cart" ?>">
                <!-- Basket icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="navbar-container__icon bi bi-bag" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                </svg>
            </a>
        </li>
    </ul>
</nav>