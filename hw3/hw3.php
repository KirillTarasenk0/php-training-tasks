<?php

echo "First task: \n";
$rgbArray = [235 => "Red", 255 => "Green", 42 => "Blue"];
print_r($rgbArray);
echo "\n";

echo "Second task: \n";
$firstArray = [-2, 4, 1, 0, 1e4, -1000];
$secondArray = ['1e2', '-1e1', 0, '44', 'php'];
echo "Оставляем только положительные числа в первом массиве: \n";
function isPositiveNumber(int $number): bool
{
    if ($number >= 0) {
        return true;
    } else {
        return false;
    }
}
$firstArray = array_filter($firstArray, "isPositiveNumber");
print_r($firstArray);
echo "\n";
echo "Оставляем только слово 'php' во втором массиве: \n";
$phpWordKey = array_search('php', $secondArray);
$secondArray = $secondArray[$phpWordKey];
print_r($secondArray);
echo "\n\n";
echo "Объединяем два массива: \n";
$unitedArray = array_merge($firstArray, array($secondArray));
print_r($unitedArray);
echo "\n";
echo "Находим сумму всех элементов нового массива: ";
echo array_sum($unitedArray) . "\n\n";

echo "Addition task: \n";
echo "Сортируем массив по возрастанию: \n";
sort($unitedArray);
print_r($unitedArray);