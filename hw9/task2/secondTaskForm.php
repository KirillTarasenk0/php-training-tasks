<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Second task form</title>
</head>
<body>
    <form action="task2.php" method="post">
        <div><label for="userName">Введите имя:</label></div>
        <div><input type="text" id="userName" name="userName" placeholder="Имя" required/></div>
        <div><label for="userSurname">Введите фамилию:</label></div>
        <div><input type="text" id="userSurname" name="userSurname" placeholder="Фамилия" required></div>
        <div><label for="userEmail">Введите Email:</label></div>
        <?php
            if (isset($_SESSION['emailError'])) {
                echo "<p style='color: red;'>" . $_SESSION['emailError'] . "</p>";
            }
        ?>
        <div><input type="email" id="userEmail" name="userEmail" required></div>
        <div><button type="submit">Отправить</button></div>
    </form>
</body>
</html>