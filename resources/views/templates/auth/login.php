<div>
    <h2 class="align-center">Account</h2>
    <div class="user-login-container">
        <button class="btn user-login-container__btn user-login-container__btn--active j-loginInTab test">Sign in</button>
        <button class="btn user-login-container__btn j-registerTab">Register</button>
    </div>
    <!-- Login -->
    <div class="form-login-container j-loginForm">
        <form action="<?php echo BASE_URL ?>/login/do" class="form-login" method="POST">
            <label class="form-login__label" for="email">E-Mail</label>
            <input class="form-login__input" type="text" id="email" name="email" placeholder="E-Mail" required autocomplete="off">
            <label class="form-login__label" for="password">Password</label>
            <input class="form-login__input" type="password" id="password" placeholder="Password" name="password" required autocomplete="off">
            <button type="submit" class="btn form-login__submit">Login</button>
        </form>
    </div>

    <!-- Register -->
    <div class="form-login-container j-registerForm hide">
        <form action="" class="form-login" method="POST">
            <label class="form-login__label" for="gender">Title</label>
            <select class="form-login__input" name="gender" id="">
                <option value="f">Ms.</option>
                <option value="m">Mr.</option>
                <option value="none">--</option>
            </select>

            <label class="form-login__label" for="fname">First Name</label>
            <input class="form-login__input" type="text" id="fname" name="fname" placeholder="First name" required>

            <label class="form-login__label" for="lname">Last name</label>
            <input class="form-login__input" type="text" id="lname" name="lname" placeholder="Last name" required>

            <label class="form-login__label" for="email">E-Mail</label>
            <input class="form-login__input" type="email" id="email" name="email" placeholder="E-Mail" required>

            <label class="form-login__label" for="password">Password</label>
            <input class="form-login__input" type="password" id="password" name="password" placeholder="Password" required>

            <button type="submit" class="btn form-login__submit">Register</button>
        </form>
    </div>
</div>