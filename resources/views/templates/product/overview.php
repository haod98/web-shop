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
<table class="user-table">
    <thead>
        <th class="user-table__head">#</th>
        <th class="user-table__head">Product name</th>
        <th class="user-table__head">Image</th>
        <th class="user-table__head">Product Price</th>
        <th class="user-table__head">Product description</th>
        <th class="user-table__head">Gender</th>
        <th class="user-table__head">Actions</th>
    </thead>

    <?php foreach ($products as $product) : ?>
        <tr class="user-table__row">
            <td class="user-table__data"><?php echo $product->id; ?></td>
            <td class="user-table__data"><?php echo $product->name; ?></td>
            <td class="user-table__data"><img class=" user-table__image" src="<?php echo BASE_URL . $product->getFirstImage(); ?>" alt=""></td>
            <td class="user-table__data"><?php echo $product->price; ?> €</td>
            <td class="user-table__data user-table__description"><?php echo $product->description; ?></td>
            <td class="user-table__data"><?php echo $product->gender; ?></td>
            <td class="user-table__data">
                <a href="<?php echo BASE_URL . "/products/$product->id/edit" ?>" class="link-reset btn btn--edit">
                    Edit
                </a>
                <a href="<?php echo BASE_URL . "/products/$product->id/delete" ?>" class="link-reset btn btn--delete">
                    Delete
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>