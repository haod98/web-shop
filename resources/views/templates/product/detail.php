<section>
    <div class="product-and-add">
        <div class="product-detail-container">
            <div class="stage-container">
                <img src="<?php echo BASE_URL . $product->getFirstImage() ?>" alt="" class="stage-container__image">
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
            <form action="<?php echo BASE_URL . "/add-to-cart/$product->id/add" ?>">
                <label for=" size">Please select size:</label>
                <select name="size" id="size">
                    <option value="small">S</option>
                    <option value="medium">M</option>
                    <option value="large">L</option>
                    <option value="xl-large">XL</option>
                </select><br>
                <button type="submit" class="btn btn--add">Add to basket</button>
            </form>
        </div>
    </div>
</section>