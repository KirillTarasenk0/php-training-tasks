<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td{
            width: 60px;
            height:60px;
            border: solid 1px silver;
            text-align:center;
        }
    </style>
</head>
<body>
<div>Task 1: </div>
<form action="hw_7.php" method="post">
    <label for="color">Выберите цвет квадрата</label>
    <input id="color" name="color" type="color"/>
    <button name="sendingColorButton" type="submit">Отправить</button>
</form>
<?php if (isset($_POST['sendingColorButton'])): ?>
    <div style="background-color: <?= $_POST['color']; ?>; width: 30px; height: 30px"></div>
<?php endif; ?>
<div>Task 2: </div>
<form action="hw_7.php" method="post">
    <div><label for="text">Введите текст:</label></div>
    <textarea name="text" id="text" cols="30" rows="10"></textarea>
    <div><button name="sendingTextButton" type="submit">Отправить</button></div>
</form>
<?php
$array = [];
$array = explode(" ", strtolower($_POST['text']));
$countArrayBeforeUnique = count($array);
$valuesCount = array_count_values($array);
$percent = 0;
?>
<?php if (isset($_POST['sendingTextButton'])): ?>
    <table style="border: 1px solid black;">
        <?php
        $arrayBeforeChanging = array_count_values($array);
        $countArrayBeforeUnique = count($array);
        $array = array_unique($array);
        ?>
        <?php foreach ($array as $value): ?>
            <tr>
                <td>
                    <?= $value ?>
                </td>
                <td>
                    <?php
                    echo $arrayBeforeChanging[$value] . " раз";
                    $percent = $arrayBeforeChanging[$value] / $countArrayBeforeUnique * 100;
                    ?>
                </td>
                <td>
                    <?= $percent . "%"; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
<div>Task 3:</div>
<form action="hw_7.php" method="post">
    <div>
        <label for="date">Введите дату своего рождения: </label>
    </div>
    <input name="date" id="date" type="date"/>
    <div>
        <button name="dateButton" type="submit">Отправить</button>
    </div>
</form>
<?php
$birthDay = 0;
$today = date("m.d.Y");
if (isset($_POST['dateButton'])) {
    $arrayBirth = explode("-", strtolower($_POST['date']));
    $arrayToday = explode(".", $today);
    if ($arrayToday[2] > $arrayBirth[0]) {
        if ($arrayToday[0] >= $arrayBirth[1]) {
            $birthDay = ($arrayToday[2] - $arrayBirth[0]);
            if ($arrayToday[1] >= $arrayBirth[2]) {
                $birthDay = $arrayToday[2] - $arrayBirth[0];
            } else  {
                $birthDay = ($arrayToday[2] - $arrayBirth[0]) - 1;
            }
        }
        else {
            $birthDay = ($arrayToday[2] - $arrayBirth[0]) - 1;
        }
    } else {
        $birthDay = 0;
        if ($arrayToday[2] < $arrayBirth[0] || $arrayToday[0] <= $arrayBirth[1] && $arrayToday[1] < $arrayBirth[2]) {
            echo "<p>Вы выбрали несуществуюшую дату. Пожалуйста, повторите ввод.</p>";
        }
    }
}
?>
<?php if (isset($_POST['dateButton'])): ?>
    <p>Полное количество лет: <?= $birthDay ?></p>
<?php endif; ?>
<div>Task 4:</div>
<?php
$today = date("m.d.Y");
$array = explode(".", $today);
$number = cal_days_in_month(CAL_GREGORIAN, $array[0], $array[2]);
$arrayDays = [];
for ($i = 1; $i <= $number; $i++) {
    $arrayDays[] = $i;
}
?>
<form action="hw_7.php" method="post">
    <div><label for="monthDays">Выберите день месяца:</label></div>
    <select name="monthDays" id="monthDays">
        <?php foreach($arrayDays as $value): ?>
            <option value="<?=$value?>"><?=$value?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Отправить</button>
</form>
</body>
</html>