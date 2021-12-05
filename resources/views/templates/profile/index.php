<div class="welcome-message">
    <h2>Welcome back, <?php echo $user->first_name ?></h2>
    <a href="<?php echo BASE_URL . "/home/logout" ?>" class="btn btn--dark link-reset">Log out</a>
</div>



<h3 class="align-center">Edit your profile</h3>
<div class="form-container">
    <form action="" class="form" method="POST">
        <label class="form__label" for="email">E-Mail</label>
        <input class="form__input" type="text" id="email" name="email" placeholder="E-Mail" value="<?php echo $user->email ?>">
        <label class="form__label" for="password">Password</label>
        <input class="form__input" type="password" id="password" placeholder="Password" name="password">
        <label class="form__label" for="password_repeat">Password</label>
        <input class="form__input" type="password" id="password_repeat" placeholder="Repeat password" name="password_repeat">
        <button type="submit" class="btn form__submit">Change</button>
    </form>
</div>