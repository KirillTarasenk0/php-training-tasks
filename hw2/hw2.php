<?php

echo "First task: <br>";
static $number = 1;
echo "Number variable before counting: " . $number . "<br>";
function counter(): int
{
    global $number;
    return $number++;
}
for ($i = 0; $i < 10; $i++) {
    echo counter() . " ";
}
echo "<br>";
echo "Number variable after counting: " . $number . "<br>";
echo "<br>";

echo "Second task: <br>";
var_dump(0 == "a");
echo "<br>";
var_dump(100 == "1e2");
echo "<br>";
var_dump([] == '');
echo "<br>";
var_dump([1, 2, 3] == pow(10000, 0));
echo "<br>";
echo "<br>";

echo "Third task: <br>";
var_dump([2,3] && '[2,3]' && (0 || false || 'false'));
echo "<br>";
var_dump(-5 || null);
echo "<br>";
var_dump(abs(2) && pow(2, 3) || max(2, 100, 1e2 + 1));
echo "<br>";

echo "Fourth task: <br>";
$closureFunction = function(int $firstNumber, int $secondNumber, int $n): int
{
    return ($firstNumber + $secondNumber) * $n;
};
function multipleSumByValue(callable $closureFunction): void
{
    $n = 3;
    echo $closureFunction(5, 10, $n) . "<br>";
}
multipleSumByValue($closureFunction);
echo "<br>";

echo "Fivth task: <br>";
$changingNumber = 0;
echo "Variables before using function: " . $changingNumber . "<br>";
function changingFunction(int &$number): void
{
    $number++;
}
changingFunction($changingNumber);
echo "Variables after using function: " . $changingNumber . "<br>";