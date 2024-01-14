<?php

session_start();

$image = "";
$img = "";
$path = "./images/";
$images = scandir($path);
if ($images !== false) {
    $images = preg_grep("/\.(?:png|gif|jpe?g)$/i", $images);
    if (is_array($images)) {
        foreach ($images as $image) {
            $img .= "<img class='avatar' src='".$path.htmlspecialchars(urlencode($image))."' alt='".$image."' />";
        }
        $image .= $img;
    }
}
?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
<div class="card home">
    <?= $img; ?>
    <h1>Привет, <?=$_SESSION['userName']?></h1>
    <form action="./actions/exit.php" method="post">
        <button name="exitButton" role="button">Выйти из аккаунта</button>
    </form>
</div>
</body>
</html>