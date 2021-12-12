<div>
    <h3 class="align-center">Your orders</h3>
    <div class="orders">
        <?php foreach ($ordersAll as $key => $orders) : ?>
            <div class="order-overview-container">
                <div class="order-detail">
                    <div>
                        <p class="order-detail__header">Order date:</p>
                        <p class="order-detail__text"><?php echo App\Controllers\OrderController::getDate($orders->created_at); ?></p>
                    </div>
                    <div>
                        <p class="order-detail__header">Order ID: </p>
                        <p class="order-detail__text"># <?php echo $orders->id ?></p>
                    </div>
                </div>
                <?php foreach ($singleOrders[$key] as $key2 => $singleOrder) : ?>
                    <div class="single-order-container">
                        <img src="<?php echo BASE_URL . json_decode($singleOrder->images)[0] ?>" class="order-img" alt="">
                        <div class="single-order-description">
                            <div>
                                <p class="single-order-header">Product name:</p>
                                <p class="single-order-text"><?php echo $singleOrder->name ?> </p>
                            </div>
                            <div>
                                <p class="single-order-header">Price per article:</p>
                                <p class="single-order-text"><?php echo $singleOrder->price ?> € </p>
                            </div>
                            <div>
                                <p class="single-order-header">Article(s):</p>
                                <p class="single-order-text"><?php echo $singleOrder->count ?> Article(s)</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div>
                    <p class="order-total"><span class="total">Total:</span> <?php echo \App\Controllers\OrderController::getTotalPriceFromOrder($singleOrders[$key]); ?> €</p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>