<h2>Delete User?</h2>
<div class="align-center delete-confirm">
    <p class="delete-confirm-text">Are you sure you want to delete <strong>#<?php echo $user->id . " " . $user->first_name . " " . $user->last_name ?></strong>?</p>
    <a href="<?php echo BASE_URL . "/users/admin/$user->id/delete/confirm" ?>" class="link-reset btn btn--delete--outline">Delete</a>
    <a href="<?php echo BASE_URL . "/users/admin" ?>" class="link-reset btn btn--delete">Cancel</a>
</div>