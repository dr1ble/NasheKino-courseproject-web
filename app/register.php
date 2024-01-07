<?php
require_once __DIR__ . '/src/helpers.php';
checkGuest();
?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<?php include_once __DIR__ . '/components/head.php'?>
<body>

<form class="card" action="/src/actions/register.php" method="post" enctype="multipart/form-data">
    <h2>Регистрация</h2>

    <label for="full_name">
        Имя
        <input
            type="text"
            id="full_name"
            name="full_name"
            placeholder="Иванов Иван"
            value="<?php echo old('full_name') ?>"
            <?php echo validationErrorAttr('full_name'); ?>
        >
        <?php if(hasValidationError('full_name')): ?>
            <small><?php echo validationErrorMessage('full_name'); ?></small>
        <?php endif; ?>
    </label>

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

    <label for="email">
        E-mail
        <input
            type="text"
            id="email"
            name="email"
            placeholder="ivan@areaweb.su"
            value="<?php echo old('email') ?>"
            <?php echo validationErrorAttr('email'); ?>
        >
        <?php if(hasValidationError('email')): ?>
            <small><?php echo validationErrorMessage('email'); ?></small>
        <?php endif; ?>
    </label>

    <label for="avatar">Изображение профиля
        <input
            type="file"
            id="avatar"
            name="avatar"
            <?php echo validationErrorAttr('avatar'); ?>
        >
        <?php if(hasValidationError('avatar')): ?>
            <small><?php echo validationErrorMessage('avatar'); ?></small>
        <?php endif; ?>
    </label>

    <div class="grid">
        <label for="password">
            Пароль
            <input
                type="password"
                id="password"
                name="password"
                placeholder="******"
                <?php echo validationErrorAttr('password'); ?>
            >
            <?php if(hasValidationError('password')): ?>
                <small><?php echo validationErrorMessage('password'); ?></small>
            <?php endif; ?>
        </label>

        <label for="password_confirmation">
            Подтверждение
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="******"
            >
        </label>
    </div>

    <fieldset>
        <label for="terms">
            <input
                type="checkbox"
                id="terms"
                name="terms"
            >
            Я принимаю все условия пользования
        </label>
    </fieldset>

    <button
        type="submit"
        id="submit"
        disabled
    >Продолжить</button>
</form>

<p>У меня уже есть <a href="index.php">аккаунт</a></p>

<?php include_once __DIR__ . '/components/scripts.php' ?>
</body>
</html>