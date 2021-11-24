<!-- On error -->
<div class="error-msg-container align-center">
    <?php foreach (\Core\Session::getAndForget('errors', []) as $error) : ?>
        <p class="error-msg-container__text"><?php echo $error; ?></p>
    <?php endforeach; ?>
</div>

<!-- On success -->
<div class="success-msg-container align-center">
    <?php foreach (\Core\Session::getAndForget('success', []) as $success) : ?>
        <p class="success-msg-container__text"><?php echo $success; ?></p>
    <?php endforeach; ?>
</div>