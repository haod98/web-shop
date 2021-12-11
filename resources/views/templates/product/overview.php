<h2 class="align-center">Product List (ADMIN)</h2>
<div class="form-container">
    <form action="<?php echo BASE_URL ?>/products/add" class="form" method="POST" enctype="multipart/form-data">
        <label class="form__label" for="product">Product name:</label>
        <input class="form__input" type="text" id="product" name="name" placeholder="Product name">

        <label class="form__label" for="price">Product price</label>
        <input class="form__input" type="text" id="price" name="price" placeholder="Product price">

        <label class="form__label" for="gender">Product gender:</label>
        <select class="form__input" name="gender" id="gender">
            <option value="-" selected disabled>-- Please select --</option>
            <option value="men">For men</option>
            <option value="women">For women</option>
        </select>

        <label for="description">Product description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form__textarea" placeholder="Your description of the product"></textarea>

        <label for="images" class="form__label">Add images:</label>
        <input type="file" name="images[]" id="images" class="form__file" multiple>

        <button class="btn btn--add add-product-container__btn">Add product
        </button>
    </form>
</div>
<div class="product-list-container">
    <?php foreach ($products as $product) : ?>
        <div class="product-container">
            <p class="product-container-text"><span class="bold ">Product id: </span><br><?php echo $product->id ?></p>
            <p class="product-container-text"><span class="bold ">Product name: </span><br><?php echo $product->name ?></p>
            <p class="product-container-text"><span class="bold ">Product price: </span><br><?php echo $product->price ?> €</p>
            <p class="product-container-text"><span class="bold ">Product description: </span><br><?php echo $product->description ?></p>
            <p class="product-container-text"><span class="bold">Product gender: </span><br><?php echo $product->gender ?></p>
            <div class="product-list-image-container">
                <img src="<?php echo BASE_URL  . $product->getFirstImage(); ?>" alt="" class="product-list-image">
            </div>
            <div>
                <a href="<?php echo BASE_URL . "/products/$product->id/edit" ?>" class="link-reset btn btn--edit">
                    Edit
                </a>
                <a href="<?php echo BASE_URL . "/products/$product->id/delete" ?>" class="link-reset btn btn--delete">
                    Delete
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>