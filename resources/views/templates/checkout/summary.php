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
            <p class="cart-detail__info m-0"><?php echo $address->address ?></p>
            <p class="cart-detail__info m-0"><?php echo $address->postal_code ?></p>
            <p class="cart-detail__info m-0"><?php echo $address->city ?></p>
        </div>
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
                    <div class="cart-detail__info">
                        <p class="cart-quantity__number"><?php echo $product->count ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="cart-total-container">
            <?php foreach ($products as $product) : ?>
                <p class="checkout-products"><?php echo $product->name . " " . $product->count . "x" . " " . \App\Services\CartService::getTotalPriceOfCurrentProduct($product->price, $product->count) ?> €</p>
            <?php endforeach; ?>
            <div class="checkout-container">
                <div class="cart-total">
                    <p class="cart-total__label">Subtotal (<?php echo \App\Services\CartService::getCount(); ?> Articles)</p>
                    <p class="cart-total__price"><?php echo \App\Services\CartService::getTotalPrice($products) ?> €</p>
                </div>
                <div class="checkout">
                    <a href="<?php echo BASE_URL . "/checkout/finish" ?>" class="btn btn--add link-reset">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>