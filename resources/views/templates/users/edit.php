<h2 class="align-center">Edit user</h2>
<div class="form-container">
    <form action="<?php echo BASE_URL . "/users/admin/$user->id/update" ?>" class="form" method="POST">
        <label class="form__label" for="fname">First Name</label>
        <input class="form__input" type="text" id="fname" name="first_name" placeholder="First name" value="<?php echo $user->first_name ?>">

        <label class="form__label" for="lname">Last name</label>
        <input class="form__input" type="text" id="lname" name="last_name" placeholder="Last name" value="<?php echo $user->last_name ?>">

        <label class="form__label" for="email">E-Mail</label>
        <input class="form__input" type="email" id="email" name="email" placeholder="E-Mail" value="<?php echo $user->email ?>">

        <button type="submit" class="btn form__submit">Update</button>
    </form>
</div>