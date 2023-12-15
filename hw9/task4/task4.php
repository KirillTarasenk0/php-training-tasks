<?php


$text = "Hello world";

$dir = opendir('dir');
$count = 0;
while ($file = readdir($dir)) {
    if ($file == '.' || $file == '..' || is_dir('dir' . $file)) {
        continue;
    }
    $count++;
}
for ($i = 0; $i < $count; $i++) {
    $fileName = "dir/example{$i}.txt";
    $file = fopen($fileName, "w");
    if (!$file) {
        echo "<p>Не удаётся открыть файл.</p>";
        exit;
    }
    if (fwrite($file, $text . "$i ") === false) {
        echo "<p>Нельзя ничего записать в файл.</p>";
        exit;
    }
    fclose($file);
    $file = fopen($fileName, "r");
    while (($result = fgets($file)) !== false) {
        echo $result . " ";
    }
    fclose($file);
}