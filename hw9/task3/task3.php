<?php

$fileName = "example.txt";
$text = null;
for ($i = 0; $i < 10; $i++) {
    $text .= rand(1, 1000) . " ";
}
$file = fopen($fileName, "w");
if (is_writable($fileName)) {
    if (!$file) {
        echo "<p>Не удаётся открыть файл.</p>";
        exit;
    }
    if (fwrite($file, $text) === false) {
        echo "<p>Нельзя ничего записать в файл.</p>";
        exit;
    }
}
fclose($file);

$file = fopen($fileName, "r");
if (is_readable($fileName)) {
    $fileData = null;
    while (($result = fgets($file)) !== false) {
        $fileData = $result;
    }
    $fileData = trim($fileData);
    $arrayData = explode(" ", $fileData);
    echo "Сумма всех чисел, хранящихся в файле: " . array_sum($arrayData);
}
fclose($file);