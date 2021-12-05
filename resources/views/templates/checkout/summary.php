<div class="cart-content-container">
    <h2 class="align-center">Summary</h2>
    <div class="cart-min-width">
        <div class="cart-summary cart-detail">
            <p class="cart-detail__label">Name:</p>
            <p class="cart-detail__info">
                <?php echo $user->first_name;
                echo " ";
                echo $user->last_name ?>
            </p>

            <p class="cart-detail__label">Address:</p>
            <p class="cart-detail__info m-0"><?php echo $address[0]->address ?></p>
            <p class="cart-detail__info m-0"><?php echo $address[0]->postal_code ?></p>
            <p class="cart-detail__info m-0"><?php echo $address[0]->city ?></p>
        </div>
        <?php foreach ($cartContents as $cartContent) : ?>
            <div class="product-in-cart">
                <div class="cart-image">
                    <img class="cart-image__image" src="<?php echo BASE_URL . $cartContent->getFirstImage() ?>" alt="">
                </div>
                <div class="cart-detail">
                    <p class="cart-detail__label">Product name:</p>
                    <p class="cart-detail__info"><?php echo $cartContent->name ?></p>
                    <p class="cart-detail__label">Product price:</p>
                    <p class="cart-detail__info"><?php echo $cartContent->price ?> €</p>
                    <p class="cart-detail__label">Quantity:</p>
                    <div class="cart-detail__info">
                        <p class="cart-quantity__number"><?php echo $cartContent->count ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="cart-total-container">
            <div class="cart-total">
                <p class="cart-total__label">Subtotal:</p>
                <p class="cart-total__price"><?php echo \App\Services\CartService::getTotalPrice($cartContents) ?> €</p>
            </div>
            <div class="checkout">
                <a href="<?php echo BASE_URL . "/checkout/summary" ?>" class="btn btn--add link-reset">Checkout</a>
            </div>
        </div>
    </div>