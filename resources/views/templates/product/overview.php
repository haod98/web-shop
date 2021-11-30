<h2 class="align-center">Product List (ADMIN)</h1>
    <div class="form-container">
        <form action="<?php echo BASE_URL ?>/sign-up/do" class="form" method="POST">
            <label class="form__label" for="product">Product name:</label>
            <input class="form__input" type="text" id="product" name="product" placeholder="Product name">

            <label class="form__label" for="price">Product price</label>
            <input class="form__input" type="text" id="price" name="price" placeholder="Product price">

            <label class="form__label" for="gender">Product gender:</label>
            <select class="form__input" name="gender" id="gender">
                <option value="-" selected disabled>-- Please select --</option>
                <option value="male">For men</option>
                <option value="female">For women</option>
            </select>

            <label for="description">Product description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form__textarea" placeholder="Your description of the product"></textarea>

            <button class="btn btn--add add-product-container__btn">Add product
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-plus-square-fill plus-icon" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                </svg>
            </button>
        </form>
    </div>
    <?php foreach ($products as $product) : ?>

        <p><?php echo $product->name ?></p>
    <?php endforeach; ?>