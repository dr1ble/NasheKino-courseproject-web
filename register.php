<?php
require_once __DIR__ . '/src/helpers.php';
checkGuest();
?>

<!DOCTYPE html>
<html lang="ru" data-theme="dark">
<?php include_once __DIR__ . '/components/headlogin.php'?>
<body>
    <style>
        .card {
            box-shadow: 0.0145rem 0.029rem 0.174rem rgba(0, 0, 0, 0.01698),
                0.0335rem 0.067rem 0.402rem rgba(0, 0, 0, 0.024),
                0.0625rem 0.125rem 0.75rem rgba(0, 0, 0, 0.03),
                0.1125rem 0.225rem 1.35rem rgba(0, 0, 0, 0.036),
                0.2085rem 0.417rem 2.502rem rgba(0, 0, 0, 0.04302),
                0.5rem 1rem 6rem rgba(0, 0, 0, 0.06),
                0 0 0 0.0625rem rgba(0, 0, 0, 0.015);
            background: #27292a;
            border-radius: 0.25rem;
            padding: 30px;
            box-sizing: border-box;
            min-height: 80%;
            margin-top: 100px;
        }
        body {
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    background: #1f2122;
    flex-direction: column;
    flex-wrap: nowrap;
    align-content: center;
    justify-content: center;
}
        
    </style>

<form class="card" action="src/actions/register.php" method="post" enctype="multipart/form-data">
    <h2 style="color: #e75e8d;">Регистрация</h2>
    <div class="form-group" >
    <label for="name"><br>
        Имя
        <input
            type="text"
            id="name"
            name="name"
            placeholder="Иванов Иван"
            value="<?php echo old('name') ?>"
            <?php echo validationErrorAttr('name'); ?>
        >
        <?php if(hasValidationError('name')): ?>
            <small><?php echo validationErrorMessage('name'); ?></small>
        <?php endif; ?>
    </label>
    </div>

    <div class="form-group">
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
    </div>

    <div class="form-group">
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
    </div>

    <div class="form-group">
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
        class="submit"
    >Продолжить</button>
</form>

<p>У меня уже есть <a href="/login.php">аккаунт</a></p>
<div class="main-button">
    <a href="/index.php" class="back-button">Назад на сайт</a><br><br><br><br>
</div>


<?php include_once __DIR__ . '/components/scripts.php' ?>
</body>
</html>