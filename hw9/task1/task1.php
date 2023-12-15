<?php

$fileName = "example.txt";
$text = "Hello world!";

if (is_writable($fileName)) {
    if (!$file = fopen($fileName, "w+")) {
        echo "<p>Не удаётся открыть файл.</p>";
        exit;
    }
    if (fwrite($file, $text) === false) {
        echo "<p>Нельзя ничего записать в файл.</p>";
        exit;
    }
    $content = file_get_contents($fileName);
    echo $content;
    fclose($file);
} else {
    echo "<p>В файл {$fileName} нельзя ничего записать.</p>";
}
