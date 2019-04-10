<?php include '../views/partials/header.php' ?>

<?php foreach ($messages['error'] as $message): ?>
    <div class="message error">
        <?= $message; ?>
    </div>
<?php endforeach; ?>

<?php foreach ($messages['success'] as $message): ?>
    <div class="message success">
        <?= $message; ?>
    </div>
<?php endforeach; ?>

    <div class="login_background"></div>
    <div class="login_container">
        <div class="login_logo">
            <img src="<?= URL ?>assets/images/logo.svg">
            <p class="login_logo_text">The Green Thumb</p>
        </div>
        <div class="login_space">
            <h1>Welcome !</h1>
            <p class="login_subtext">Create account to continue</p>
            <form action="#" method="post">
                <div class="field">
                    <label for="login">Email address</label>
                    <br>
                    <input type="text" name="login" id="login" value="<?= $_POST['login'] ?>" placeholder="plant@green.com">
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <br>
                    <input type="password" name="password" id="password" value="<?= $_POST['password'] ?>" placeholder="••••••••••••••">
                </div>

                <div class="field">
                    <input class="submit_button" type="submit" value="Login">
                </div>
            </form>
            <div class="new">
                <p class="login_subtext">Already have an account ?</p>
                <a href="<?= URL ?>connect">Login here</a>
            </div>
        </div>
    </div>

<?php include '../views/partials/footer.php' ?>