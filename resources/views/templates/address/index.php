<div>
    <h2 class="align-center">Address</h2>
    <div class="form-container">
        <form action="<?php echo BASE_URL ?>/checkout/address/do" class="form" method="POST">
            <label class="form__label" for="address">Address</label>
            <input class="form__input" type="text" id="address" name="address" placeholder="Your address" value="<?php echo $address[0]->address ?>">

            <label class="form__label" for="postal">Postal code</label>
            <input class="form__input" type="text" id="postal" name="postal" placeholder="Your postal code" value="<?php echo $address[0]->postal_code ?>">

            <label class="form__label" for="city">City</label>
            <input class="form__input" type="text" id="city" name="city" placeholder="Your city" value="<?php echo $address[0]->city ?>">

            <button type="submit" class="btn form__submit">Confirm</button>
        </form>
    </div>
</div>