<div class="card-container">
    <div class="card-container-text">
        <h1 class="card-container-text__heading">Summer Collection</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Facere, et quas, nobis nulla unde, tempore dignissimos veritatis repellat qui laborum impedit. Provident at distinctio tenetur, quos natus doloribus
            quas. Vero!</p>
        <a href="<?php echo BASE_URL . "/women" ?>" class="link-reset btn btn--cta-btn">Shop our newest collection</a>
    </div>
    <div class="card-img-container">
        <img src="<?php echo BASE_URL ?>/assets/hero.png" alt="" class="card-img-container__img">
    </div>
</div>
<div class=" new-product-container">
    <h2 class="align-center">New arrivals</h2>
    <div class="products-container">
        <?php foreach ($productsWomen as $product) : ?>
            <div class="single-product">
                <a href="<?php echo BASE_URL . "/products/details/$product->id" ?>">
                    <img src="<?php echo BASE_URL  . $product->getFirstImage(); ?>" alt="" class="single-product__image">
                </a>
                <p class="single-product__name"><?php echo $product->name ?></p>
                <p class="single-product__price"><?php echo $product->price ?> €</p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="card-container">
    <div class="card-container-text card-container-text--left">
        <h2 class="card-container-text__heading">Our Mission</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Facere, et quas, nobis nulla unde, tempore dignissimos veritatis repellat qui laborum impedit. Provident at distinctio tenetur, quos natus doloribus
                quas. Vero!</p>
    </div>
    <div class="card-img-container  card-img-container--right">
        <!-- TODO Remove dummy image and add image -->
        <img src="<?php echo BASE_URL ?>/assets/hero2.jpg" alt="" class="card-img-container__img">
    </div>
</div>
<div class=" new-product-container mb-0">
    <h2 class="align-center">New arrivals</h2>
    <div class="products-container">
        <?php foreach ($productsMen as $product) : ?>
            <div class="single-product">
                <a href="<?php echo BASE_URL . "/products/details/$product->id" ?>">
                    <img src="<?php echo BASE_URL  . $product->getFirstImage(); ?>" alt="" class="single-product__image">
                </a>
                <p class="single-product__name"><?php echo $product->name ?></p>
                <p class="single-product__price"><?php echo $product->price ?> €</p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once(__DIR__ . "/../partials/newsletter.php");
