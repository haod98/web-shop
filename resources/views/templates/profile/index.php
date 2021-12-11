<div class="welcome-message">
    <h2>Welcome back, <?php echo $user->first_name ?></h2>
    <a href="<?php echo BASE_URL . "/home/logout" ?>" class="btn btn--dark link-reset">Log out</a>
</div>

<div>
    <h3 class="align-center">My orders</h3>
</div>


<h3 class="align-center">Edit your profile</h3>
<div class="form-container">
    <form action="<?php echo BASE_URL . "/home/update" ?>" class=" form" method="POST">
        <label class="form__label" for="email">E-Mail</label>
        <input class="form__input" type="text" id="email" name="email" placeholder="E-Mail" value="<?php echo $user->email ?>">
        <label class="form__label" for="password">Password</label>
        <input class="form__input" type="password" id="password" placeholder="Password" name="password">
        <label class="form__label" for="password_repeat">Password repeat</label>
        <input class="form__input" type="password" id="password_repeat" placeholder="Repeat password" name="password_repeat">
        <button type="submit" class="btn form__submit">Change</button>
    </form>
</div>
<div>
    <h3 class="align-center">Edit your address</h3>
    <div class="form-container">
        <form action="<?php echo BASE_URL ?>/home/address/update" class="form" method="POST">
            <label class="form__label" for="address">Address</label>
            <input class="form__input" type="text" id="address" name="address" placeholder="Your address" value="<?php echo $address->address ?>">

            <label class="form__label" for="postal">Postal code</label>
            <input class="form__input" type="text" id="postal" name="postal" placeholder="Your postal code" value="<?php echo $address->postal_code ?>">

            <label class="form__label" for="city">City</label>
            <input class="form__input" type="text" id="city" name="city" placeholder="Your city" value="<?php echo $address->city ?>">

            <button type="submit" class="btn form__submit">Change</button>
        </form>
    </div>
</div>