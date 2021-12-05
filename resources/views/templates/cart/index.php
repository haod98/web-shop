<?php if (!\App\Models\User::isLoggedIn()) : ?>
    <div class="align-center">
        <h2>Not logged in</h2>
        <a href="<?php echo BASE_URL . "/login" ?>" class="btn btn--dark btn-reminder link-reset">Please login to use the cart</a>
    </div>
<?php else : ?>

    <?php if (!empty(\App\Services\CartService::get())) : ?>
        <div class="cart-content-container">
            <h2 class="align-center">Cart</h2>
            <div class="cart-min-width">
                <?php foreach ($products as $product) : ?>
                    <div class="product-in-cart">
                        <div class="cart-image">
                            <img class="cart-image__image" src="<?php echo BASE_URL . $product->getFirstImage() ?>" alt="">
                        </div>
                        <div class="cart-detail">
                            <p class="cart-detail__label">Product name:</p>
                            <p class="cart-detail__info"><?php echo $product->name ?></p>
                            <p class="cart-detail__label">Product price:</p>
                            <p class="cart-detail__info"><?php echo $product->price ?> €</p>
                            <p class="cart-detail__label">Quantity:</p>
                            <div class="cart-quantity cart-detail__info">
                                <a class="link-reset btn btn--dark" href="<?php echo BASE_URL . "/products/$product->id/remove-from-cart" ?>">-</a>
                                <p class="cart-quantity__number"><?php echo $product->count ?></p>
                                <a class="link-reset btn btn--dark" href="<?php echo BASE_URL . "/products/$product->id/add-to-cart" ?>">+</a>
                            </div>
                        </div>
                        <div class="remove-all">
                            <a href="<?php echo BASE_URL . "/products/$product->id/remove-all-from-cart" ?>"><svg xmlns="http://www.w3.org/2000/svg" class="bi bi-x-lg remove-all__icon" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
                                    <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
                                </svg></a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="cart-total-container">
                    <div class="cart-total">
                        <p class="cart-total__label">Subtotal:</p>
                        <p class="cart-total__price"><?php echo \App\Services\CartService::getTotalPrice($products) ?> €</p>
                    </div>
                    <div class="checkout">
                        <a href="<?php echo BASE_URL . "/checkout/address" ?>" class="btn btn--add link-reset">Checkout</a>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <h2 class="align-center">Your cart seems empty :(</h2>
            <p class="align-center">Try adding some products</p>
        <?php endif; ?>
    <?php endif; ?>