<?php


//TASK1:

$myName = 'Kirill';
$myAge = 19;
echo "Меня зовут " . $myName . ".<br>" . "Мне " . $myAge . " лет. <br><br>";

//TASK2:

$myLessonsImpression = 10;
echo "Мой уровень удовлетворения от прошедшего урока: " . $myLessonsImpression . ". <br><br>";

//TASK3:

const VARIABLESQUANTITY = 8;
echo "Количество типов в PHP: " . VARIABLESQUANTITY . ".<br><br>";

//TASK4:

$myName = 'Александр';
$myAge = 23;

//TASK4 FIRST VARIANT:
echo "Всем привет, меня зовут $myName и мне $myAge года.<br>";

//TASK4 SECOND VARIANT:
echo "Всем привет, меня зовут " . $myName . " и мне " . $myAge . " года.<br>";

//TASK4 THIRD VARIANT:
echo "Всем привет, меня зовут {$myName} и мне {$myAge} года.<br><br>";

//TASK5:

$firstTypeVariable = true;
echo json_encode($firstTypeVariable) . "<br>";
$secondTypeVariable = false;
echo json_encode($secondTypeVariable) . "<br>";
$thirdTypeVariable = 100;
echo $thirdTypeVariable . "<br>";
$fourthTypeVariable = 5.5;
echo $fourthTypeVariable . "<br>";
$fivthTypeVariable = [1, 2, 3, 4, 5];
print_r($fivthTypeVariable);
echo "<br>";
$sixthTypeVariable = null;
echo $sixthTypeVariable . "<br>";
$seventhTypeVariable = "Hello world";
echo $seventhTypeVariable . "<br><br>";

//ADDITION TASK(other variables):

//объект
class Person
{
    private string $personName;

    public function __construct(string $personName)
    {
        $this->personName = $personName;
    }

    public function personSayHi(): void
    {
        echo "Hello! I'm {$this->personName} <br><br>";
    }
}

$firstPerson = new Person("Kirill");
$firstPerson->personSayHi();

//callback функция

function printIsRealAge(int $age, $callbackFunction): void
{
    if ($callbackFunction($age)) {
        echo "Человек с таким возрастом может существовать <br><br>";
    } else {
        echo "Людей с возрастом меньше 0 не бывает! <br><br>";
    }
}

$checkAge = function (int $age): bool {
    if ($age > 0) {
        return true;
    } else {
        return false;
    }
};
printIsRealAge(5, $checkAge);
printIsRealAge(-5, $checkAge);

//mixed
function printParam(mixed $param): void
{
    echo "Переданный параметр в функцию: " . $param . "<br>";
}

printParam(10);
printParam(1.1);
printParam("Param");
printParam(true);
echo "<br>";

//return types
function printText(string $text): void
{
    echo $text . "<br>";
}

printText("Text");
function returnIntNumber(int $number): int
{
    return $number;
}

echo returnIntNumber(5) . "<br>";

function returnFloatNumber(float $number): float
{
    return $number;
}

echo returnFloatNumber(5.5) . "<br>";

function returnString(string $text): string
{
    return $text;
}

echo returnString("Return string") . "<br>";

function returnArray(array $array): array
{
    return $array;
}

print_r(returnArray(["firstItem" => 1, "secondItem" => 2, "thirdItem" => 3, "fourthItem" => 4, "fivthItem" => 5]));
echo "<br>";

function returnBool(bool $statement): bool
{
    return $statement;
}

echo json_encode(returnBool(true)) . "<br>";
echo json_encode(returnBool(false));