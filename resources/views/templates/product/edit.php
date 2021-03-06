<h2 class="align-center">Edit Product (Admin)</h2>
<div class="form-container">
    <form action="<?php echo BASE_URL . "/products/{$product->id}/edit/update" ?>" class="form" method="POST" enctype="multipart/form-data">
        <label class="form__label" for="product">Product name:</label>
        <input class="form__input" type="text" id="product" name="name" placeholder="Product name" value="<?php echo $product->name ?>">

        <label class="form__label" for="price">Product price</label>
        <input class="form__input" type="text" id="price" name="price" placeholder="Product price" value="<?php echo $product->price ?>">

        <label class="form__label" for="gender">Product gender:</label>
        <select class="form__input" name="gender" id="gender">
            <option <?php echo $product->gender === "men" ? "selected" : '' ?> value="men">For men</option>
            <option <?php echo $product->gender === "women" ? "selected" : '' ?> value="women">For women</option>
        </select>

        <label for="description">Product description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form__textarea" placeholder="Your description of the product"><?php echo $product->description ?></textarea>

        <label for="images" class="form__label">Add images:</label>
        <input type="file" name="images[]" id="images" class="form__file" multiple>
        <div class="product-list-image-container">
            <?php foreach ($product->getImages() as $image) : ?>
                <div>
                    <img src="<?php echo BASE_URL  . $image ?>" alt="" class="product-list-image">
                    <div class="align-center">
                        <input type="checkbox" id="delete-images[<?php echo $image ?>]" name="delete-images[]" value="<?php echo $image ?>">
                        <label for="delete-images[<?php echo $image ?>]">Delete</label>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="edit-btn-container">
            <button class="btn btn--add add-product-container__btn btn-helper">Update
            </button>
            <a href="<?php echo BASE_URL . "/products" ?>" class="btn btn--delete--outline link-reset">Cancel</a>
        </div>
    </form>
</div>