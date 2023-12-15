<?php

error_reporting(0);

if (isset($_POST['firstPrBtn']) && !empty('firstPrNumber') && $_POST['firstPrNumber'] > 0) {
    setcookie("pr1", $_POST['firstPrNumber'], time() + 3600, "/");
    $_COOKIE['pr1'] = $_POST['firstPrNumber'];
    $_SESSION['addedInfo'] = "Pr1 was added";
}
if (isset($_POST['secondPrBtn']) && !empty('secondPrNumber') && $_POST['secondPrNumber'] > 0) {
    setcookie("pr2", $_POST['secondPrNumber'], time() + 3600, "/");
    $_COOKIE['pr2'] = $_POST['secondPrNumber'];
    $_SESSION['addedInfo'] = "Pr2 was added";
}
if (isset($_POST['thirdPrBtn']) && !empty('thirdPrNumber') && $_POST['thirdPrNumber'] > 0) {
    setcookie("pr3", $_POST['thirdPrNumber'], time() + 3600, "/");
    $_COOKIE['pr3'] = $_POST['thirdPrNumber'];
    $_SESSION['addedInfo'] = "Pr3 was added";
}
if (isset($_POST['clearButton'])) {
    if (isset($_COOKIE['pr1'])) {
        setcookie("pr1", "", time() - 1, "/");
        unset($_COOKIE['pr1']);
    }
    if (isset($_COOKIE['pr2'])) {
        setcookie("pr2", "", time() - 1, "/");
        unset($_COOKIE['pr2']);
    }
    if (isset($_COOKIE['pr3'])) {
        setcookie("pr3", "", time() - 1, "/");
        unset($_COOKIE['pr3']);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basket</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container">
    <div class="cards__container">
        <div class="card">
            <h2 class="card__title">Pr1</h2>
            <p class="card__price">$ 200</p>
            <form class="card__form" action="view.php" method="post">
                <div class="card__input-container">
                    <input class="card__input" name="firstPrNumber" type="number" value="1"/>
                </div>
                <div class="card__button-container">
                    <button class="card__button" name="firstPrBtn" type="submit">Add to Cart</button>
                </div>
            </form>
        </div>
        <div class="card">
            <h2 class="card__title">Pr2</h2>
            <p class="card__price">$ 300</p>
            <form class="card__form" action="view.php" method="post">
                <div class="card__input-container">
                    <input class="card__input" name="secondPrNumber" type="number" value="1"/>
                </div>
                <div class="card__button-container">
                    <button class="card__button" name="secondPrBtn" type="submit">Add to Cart</button>
                </div>
            </form>
        </div>
        <div class="card">
            <h2 class="card__title">Pr3</h2>
            <p class="card__price">$ 400</p>
            <form class="card__form" action="view.php" method="post">
                <div class="card__input-container">
                    <input class="card__input" name="thirdPrNumber" type="number" value="1"/>
                </div>
                <div class="card__button-container">
                    <button class="card__button" name="thirdPrBtn" type="submit">Add to Cart</button>
                </div>
            </form>
        </div>
    </div>
    <h2>Order Details</h2>
    <?php
    if (!empty($_SESSION['addedInfo'])) {
        echo "<div class='info'>" . $_SESSION['addedInfo'] . "</div>";
    }
    ?>
    <table>
        <tr>
            <form action="view.php" method="post">
                <button name="clearButton" type="submit">Clear card</button>
            </form>
        </tr>
        <tr>
            <td>Item Name</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Total</td>
            <td>Action</td>
        </tr>
        <?php
        $generalTotal = 0;
        for ($i = 0; $i < 4; $i++) {
            if (!empty($_COOKIE["pr$i"])) {
                $name = "pr$i";
                $quantity = $_COOKIE["pr$i"];
                $price = $_COOKIE["pr$i"] * 100 + 100;
                $totalPrice = $price * $_COOKIE["pr$i"];
                $generalTotal += $totalPrice;
                echo
                "<tr>
                              <td>$name</td>
                              <td>$quantity</td>
                              <td>$price</td>
                              <td>$totalPrice</td>
                              <td>
                                <form action='view.php' method='post'>
                                    <button name='removeButton$i' type='submit'>Remove</button>
                                </form>
                              </td>
                        </tr>";
                if (isset($_POST["removeButton$i"])) {
                    setcookie("pr$i", "", time() - 1, "/");
                    unset($_COOKIE["pr$i"]);
                }
            }
        }
        ?>
        <tr>
            <td colspan="3">Total</td>
            <td><?=$generalTotal?></td>
            <td></td>
        </tr>
    </table>
</div>
</body>
</html>