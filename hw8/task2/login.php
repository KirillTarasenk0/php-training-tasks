<?php
session_start();
if (!empty($_SESSION['counter']) && $_SESSION['counter']  > 5) {
    echo "Превышен лимит использования сессии, залогиньтесь снова!<br>";
    unset($_SESSION['counter']);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
</head>
<body>
<form action="login.php" method="post">
    <div><label for="login">Login:</label></div>
    <input id="login" name="login" type="text" placeholder="Login">
    <div><label for="password">Password:</label></div>
    <input id="password" name="password" type="password" placeholder="Password">
    <div><button name="submitButton" type="submit">Отправить</button></div>
</form>
<?php
if (!empty($_POST['login']) && !empty($_POST['password']) && isset($_POST['submitButton'])) {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
    header("Location: info.php");
}
?>
</body>
</html>