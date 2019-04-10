<?php include '../views/partials/header.php' ?>

<div class="login-background"></div>
<div class="login-container">
    <div class="login-logo">
        <img src="<?= URL ?>assets/images/logo.svg">
        <p class="login-logo-text">The Green Thumb</p>
    </div>
    <div class="login-space">
        <h1>Welcome back !</h1>
        <p class="login-subtext">Please login to continue</p>
        <form action="#" method="post">
            <div class="field">
                <label for="login">E-mail address</label>
                <br>
                <input type="text" name="login" id="login">
            </div>

            <div class="field">
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" id="password">
            </div>

            <div class="field">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</div>

<?php //include '../views/partials/footer.php' ?>