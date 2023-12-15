<?php

$fileName = "data.csv";
$dataArray = [];

if (file_exists($fileName)) {
    $file = fopen($fileName, "r");
    $data = null;
    if ($file !== false) {
        while (($data = fgetcsv($file, 0, ",")) !== false) {
            $dataArray[] = $data;
        }
    }
    fclose($file);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>task5</title>
</head>
<style>
    td{
        width: 60px;
        height:60px;
        border: solid 1px silver;
        text-align:center;
    }
</style>
<body>
    <table>
        <?php foreach ($dataArray as $items): ?>
            <tr>
                <?php foreach ($items as $row): ?>
                    <td><?php echo $row; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
