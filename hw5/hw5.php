<?php

//Task 1
$array = [2, 56, 12, 3, 0, 100, -5, 7];
$dividingNumber = 36;
function findNumbersInArray(array $array, int $number): array
{
    $newArray = [];
    for ($i = 0; $i < count($array) - 1; $i++) {
        if ($array[$i] === 0) {
            continue;
        }
        if ($number % $array[$i] === 0) {
            $newArray[] = $array[$i];
        }
    }
    return $newArray;
}
print_r(findNumbersInArray($array, $dividingNumber));

//Task 2
echo "\n";
$array = [11, 23, 54, 666, 77773];
function differentNumbersInArray(array $array): array
{
    $newArray = [];
    for ($i = 0; $i < count($array); $i++) {
        $newArray[] = str_split($array[$i]);
    }
    $finishedArray = [];
    foreach ($newArray as $newArrayItem) {
        sort($newArrayItem);
        if ($newArrayItem[0] === $newArrayItem[1]) {
            continue;
        }
        $finishedArray[] = $newArrayItem;
    }
    return $finishedArray;
}
print_r(differentNumbersInArray($array));

//task 3
$seconds = 90060;
function splitSeconds(int $seconds): string
{
    if ($seconds < 0) {
        return "Error. Argument isn't correct number.";
    }
    $days = floor($seconds / 86400);
    $hours = floor($seconds % 86400 / 3600);
    $minutes = floor($seconds % 86400 % 3600 / 60);
    $dayName = null;
    $hourName = null;
    $minuteName = null;
    switch ($days) {
        case $days >= 5 && $days <= 20:
            $dayName = "дней";
            break;
        case $days % 10 === 1:
            $dayName = "день";
            break;
        default:
            $dayName = "дня";
            break;
    }
    switch ($hours) {
        case $hours % 10 >= 2 && $hours % 10 <= 4:
            $hourName = "часа";
            break;
        case $hours >= 5 && $hours <= 20:
            $hourName = "часов";
            break;
        default:
            $hourName = "час";
            break;
    }
    switch ($minutes) {
        case $minutes % 10 >= 2 && $minutes % 10 <= 4:
            $minuteName = "минуты";
            break;
        case $minutes % 10 >= 5 && $minutes % 10 <= 9:
            $minuteName = "минут";
            break;
        case $minutes % 10 === 0 && $minutes != 1:
            $minuteName = "минут";
            break;
        default:
            $minuteName = "минута";
            break;
    }
    return "{$days} {$dayName}, {$hours} {$hourName}, {$minutes} {$minuteName}";
}
echo splitSeconds($seconds);