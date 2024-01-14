<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body style="padding-top: 200px">
<form class="card" action="./actions/register.php" method="post" enctype="multipart/form-data">
    <h2>Регистрация</h2>
    <?php if (!empty($_SESSION['registrationError'])): ?>
        <div class="notice error"><?=$_SESSION['registrationError']?></div>
    <?php endif; ?>
    <label for="name">Имя</label>
    <input type="text" id="name" name="name" placeholder="Иванов Иван" value="">
    <label for="email">E-mail</label>
    <input type="text" id="email" name="email" placeholder="ivan@areaweb.su" value="">
    <label for="avatar">Изображение профиля</label>
    <input type="file" id="avatar" name="avatar">
    <div class="grid">
        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" placeholder="******">
        <label for="password_confirmation">Подтверждение</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="******">
    </div>
    <fieldset>
        <label for="terms">Я принимаю все условия пользования</label>
        <input type="checkbox" id="terms" name="terms">
    </fieldset>
    <button type="submit" name="homeEnter" id="submit">Продолжить</button>
</form>
<p>У меня уже есть <a href="authorization.php">аккаунт</a></p>
</body>
</html>