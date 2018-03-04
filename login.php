<?php $page_title = "Login"; ?>
<?php include "inc/header.php"; ?>

<div class="l_flex-centered">
    <div class="login">
        <span class="login__header">Login</span>
        <form class="login__form" method="post">
            <div class="login__inputBox">
                <input class="login__input" type="text" name="un" id="un" required="">
                <label class="login__label" for="un">Username</label>
            </div>
            <div class="login__inputBox">
                <input class="login__input" type="password" name="pw" id="pw" required="">
                <label class="login__label" for="pw">Password</label>
            </div>

            <div class="alert alert-danger">Wrong Email</div>

            <input class="btn btn-primary login__button" type="submit" value="Login">
        </form>
    </div>
</div>

<?php include "inc/footer.php"; ?>