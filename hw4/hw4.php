<?php

echo "Task 1: \n";
$firstArray = ['abc', 'abcd', 'd', 'sdfadsf'];
$firstArrayStrIndex = 0;
$firstArraySize = sizeof($firstArray);
for ($i = 0; $i < $firstArraySize - 1; $i++) {
    if (strlen($firstArray[$i]) < strlen($firstArray[$i + 1])) {
        $firstArrayStrIndex = $i;
    }
}
echo "Индекс строки с наименьшей длинной: " . $firstArrayStrIndex .  "\n\n";

echo "Task 2: \n";
$secondArray = ['Alex', 'John', 'Tom', 'Brad', 'Steve'];
function searchNames(string $arrayItem): bool
{
    if (preg_match("/\bA|B/i", $arrayItem, $secondArray)) {
        return true;
    } else {
        return false;
    }
}
$secondArray = array_filter($secondArray, 'searchNames');
print_r($secondArray);
echo "\n";

echo "Task 3: \n";
$testStr1 = "Remove last word from this string.";
$testStr2 = "I love PHP!";
echo "First string before replacement: {$testStr1} \n";
echo "First string after replacement: " . preg_replace("/\s\w+\S$/i", "", $testStr1) . "\n";
echo "Second string before replacement: {$testStr2} \n";
echo "Second string after replacement: " . preg_replace("/\s\w+\S$/i", "", $testStr2) . "\n\n";

echo "Task 4: \n";
$regularExpression = "/^(http|https):\/\/(www|[A-z]+|\.[A-z]+|www\.[A-z]+|[A-z]+\.[A-z]+)\.([A-z]{2,6})(\s*|:\d+|\?[A-z]+=[A-z]+|\/)$/i";
var_dump(preg_match($regularExpression, "https://subdomain.google.com", $array));
var_dump(preg_match($regularExpression, "https://www.google.com:8080", $array));
var_dump(preg_match($regularExpression, "https://www.google.com?query=string", $array));
var_dump(preg_match($regularExpression, "http://google.com", $array));
var_dump(preg_match($regularExpression, "https://google.com", $array));
var_dump(preg_match($regularExpression, "http://www.google.com/", $array));