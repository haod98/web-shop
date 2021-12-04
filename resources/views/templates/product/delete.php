<h2 class="align-center">Product Delete (ADMIN)</h2>
<div class="align-center delete-confirm">
    <p class="delete-confirm-text">Are you sure you want to delete <strong><?php echo $product->name ?></strong>?</p>
    <a href="<?php echo BASE_URL . "/products/$product->id/delete/confirm" ?>" class="link-reset btn btn--delete--outline">Delete</a>
    <a href="<?php echo BASE_URL . "/products" ?>" class="link-reset btn btn--delete">Cancel</a>
</div>