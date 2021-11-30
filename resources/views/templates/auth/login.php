<div>
    <h2 class="align-center">Account</h2>
    <div class="user-login-container">
        <button class="btn user-login-container__btn user-login-container__btn--active j-loginInTab test">Sign in</button>
        <button class="btn user-login-container__btn j-registerTab">Register</button>
    </div>
    <!-- Login -->
    <div class="form-container j-loginForm">
        <form action="<?php echo BASE_URL ?>/login/do" class="form" method="POST">
            <label class="form__label" for="email">E-Mail</label>
            <input class="form__input" type="text" id="email" name="email" placeholder="E-Mail" autocomplete="off">
            <label class="form__label" for="password">Password</label>
            <input class="form__input" type="password" id="password" placeholder="Password" name="password" autocomplete="off">
            <button type="submit" class="btn form__submit">Login</button>
        </form>
    </div>

    <!-- Register -->
    <!-- Required attribute removed for easier dev -->
    <div class="form-container j-registerForm hide">
        <form action="<?php echo BASE_URL ?>/sign-up/do" class="form" method="POST">
            <label class="form__label" for="fname">First Name</label>
            <input class="form__input" type="text" id="fname" name="first_name" placeholder="First name">

            <label class="form__label" for="lname">Last name</label>
            <input class="form__input" type="text" id="lname" name="last_name" placeholder="Last name">

            <label class="form__label" for="email">E-Mail</label>
            <input class="form__input" type="email" id="email" name="email" placeholder="E-Mail">

            <label class="form__label" for="password">Password</label>
            <input class="form__input" type="password" id="password" name="password" placeholder="Password">

            <label class="form__label" for="password_repeat">Repeat password</label>
            <input class="form__input" type="password" id="password_repeat" name="password_repeat" placeholder="Repeat password">

            <button type="submit" class="btn form__submit">Register</button>
        </form>
    </div>
</div>