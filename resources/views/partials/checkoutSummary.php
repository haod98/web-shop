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
            <a href="<?php echo BASE_URL . "/checkout/address" ?>" class="btn btn--add link-reset">Checkout</a>
        </div>
    </div>
</div>