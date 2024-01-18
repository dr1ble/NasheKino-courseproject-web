<?php
require_once __DIR__ . '/src/helpers.php';

checkGuest();
?>

<!DOCTYPE html>
<html lang="ru" data-theme="dark">
<?php include_once __DIR__ . '/components/headlogin.php' ?>

<body>
    <style>
        .cardLogin {
            box-shadow: 0.0145rem 0.029rem 0.174rem rgba(0, 0, 0, 0.01698),
                0.0335rem 0.067rem 0.402rem rgba(0, 0, 0, 0.024),
                0.0625rem 0.125rem 0.75rem rgba(0, 0, 0, 0.03),
                0.1125rem 0.225rem 1.35rem rgba(0, 0, 0, 0.036),
                0.2085rem 0.417rem 2.502rem rgba(0, 0, 0, 0.04302),
                0.5rem 1rem 6rem rgba(0, 0, 0, 0.06),
                0 0 0 0.0625rem rgba(0, 0, 0, 0.015);
            background: #27292a;
            border-radius: 0.25rem;
            padding: 40px;
            box-sizing: border-box;
            min-height: 45%;
            margin-top: 100px;
        }
    </style>

    <form class="cardLogin" action="src/actions/login.php" method="post">
        <h2 style="color: #ff414e;">Вход</h2>

        <?php if (hasMessage('error')): ?>
            <div class="notice error">
                <?php echo getMessage('error') ?>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="email"><br>Имя</label>
            <input type="text" id="email" name="email" placeholder="sample@test.ru" value="<?php echo old('email') ?>"
                <?php echo validationErrorAttr('email'); ?>>
            <?php if (hasValidationError('email')): ?>
                <small>
                    <?php echo validationErrorMessage('email'); ?>
                </small>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" placeholder="******">
        </div>

        <button type="submit" id="submit" class="submit">Продолжить</button>
    </form>

    <p>У меня еще нет <a href="/register.php">аккаунта</a></p>
    <div class="main-button">
        <br><a href="/index.php" class="back-button">на сайт</a>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/custom.js"></script>

    <?php include_once __DIR__ . '/components/scripts.php' ?>
</body>

</html>