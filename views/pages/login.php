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

<div class="login_bg"></div>
<div class="login_page">
    <div class="login_container">
        <div class="login_logo">
            <img src="<?= URL ?>assets/images/logo.svg">
            <p class="login_logo_text">The Green Thumb</p>
        </div>
        <div class="login_space">
            <h1>Welcome back !</h1>
            <p class="login_subtext">Please login to continue</p>
            <form action="#" method="post">
                <div class="field autocomplete="off">
                    <label for="login">Email address</label>
                    <br>
                    <input type="text" name="login" id="login" value="<?= !empty($_POST['login']) ? $_POST['login'] : '' ?>" placeholder="plant@green.com">
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <br>
                    <input type="password" name="password" id="password" value="<?= !empty($_POST['password']) ? $_POST['password'] : '' ?>" placeholder="••••••••••••••">
                </div>

                    <div class="field">
                        <input class="submit_button" type="submit" value="Login">
                    </div>
                </form>
            <div class="new">
                <p class="login_subtext">New to The Green Thumb ?</p>
                <a href="<?= URL ?>signup">Create account here</a>
            </div>
        </div>
    </div>


<?php include '../views/partials/footer.php' ?>