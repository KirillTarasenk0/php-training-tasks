<?php session_start() ?>
<!doctype html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authorization</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
    <form class="card" action="./actions/authorize.php" method="post">
        <h2>Вход</h2>
        <?php if (!empty($_SESSION['authorizationError'])): ?>
            <div class="notice error"><?=$_SESSION['authorizationError']?></div>
        <?php endif; ?>
        <label for="email">Имя</label>
        <input type="text" id="email" name="email" placeholder="ivan@areaweb.su" value="">
        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" placeholder="******">
        <button type="submit" id="submit" name="authorizeButton">Продолжить</button>
    </form>
    <p>У меня еще нет <a href="registration.php">аккаунта</a></p>
</body>
</html>