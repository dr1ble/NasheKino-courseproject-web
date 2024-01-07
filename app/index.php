<?php
require_once __DIR__ . '/src/helpers.php';
checkGuest();
?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<?php include_once __DIR__ . '/components/head.php'?>
<body>

<form class="card" action="src/actions/login.php" method="post">
    <h2>Вход</h2>

    <?php if(hasMessage('error')): ?>
        <div class="notice error"><?php echo getMessage('error') ?></div>
    <?php endif; ?>

    <label for="login">
        Логин
        <input
            type="text"
            id="login"
            name="login"
            placeholder="Ivanov123"
            value="<?php echo old('login') ?>"
            <?php echo validationErrorAttr('login'); ?>
        >
        <?php if(hasValidationError('login')): ?>
            <small><?php echo validationErrorMessage('login'); ?></small>
        <?php endif; ?>
    </label>

    <label for="password">
        Пароль
        <input
            type="password"
            id="password"
            name="password"
            placeholder="******"
        >
    </label>

    <button
        type="submit"
        id="submit"
    >Продолжить</button>
</form>

<p>У меня еще нет <a href="register.php">аккаунта</a></p>

<?php include_once __DIR__ . '/components/scripts.php' ?>
</body>
</html>