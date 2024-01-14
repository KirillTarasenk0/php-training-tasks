<?php

require_once "task1/WorkersAddressBook.php";
require_once "task2/FlatFigure.php";
require_once "task2/VolumeMeasurable.php";
require_once "task2/Square.php";
require_once "task2/Triangle.php";
require_once "task2/Cube.php";
require_once "task2/RectangularParallelepiped.php";

echo "Task 1: <br><br>";
$book = new WorkersAddressBook("Kirill");
echo $book . "<br>";
$book->addContactPhone("Kirill", "+375447967653");
echo $book . "<br>";
$book->changeContactPhone("Kirill", "+375293440075");
echo $book . "<br>";
$book->deleteContactPhone("Kirill");
echo $book . "<br>";
$book->addContactPost("Kirill", "developer");
echo $book . "<br>";
$book->changeContactPost("Kirill", "worker");
echo $book . "<br>";
$book->deleteContactPost("Kirill");
$book->addContactPhone("Kirill", "+375447967653");
$book->addContactPost("Kirill", "developer");
echo $book . "<br>";
WorkersAddressBook::addContactsToArray($book);
$book1 = new WorkersAddressBook("Anton", "+428395986", "developer");
WorkersAddressBook::addContactsToArray($book1);
$book2 = new WorkersAddressBook("Ivan");
$book2->addContactPhone("Ivan", "+37540124858");
$book2->addContactPost("Ivan", "QA");
WorkersAddressBook::addContactsToArray($book2);
print_r(WorkersAddressBook::$contactsList);

echo "<br><br>Task 2:<br><br>";
//в массив передаём стороны квадрата
$square = new Square("Квадрат", [2, 2, 2, 2]);
echo $square->getFigurePerimeter() . "<br>";
echo $square->getSurfaceArea() . "<br>";
echo $square. "<br>";
//в массив передаём первым параметром высоту, остальными - стороны треугольника
$triangle = new Triangle("Треугольник", [5, 3]);
echo $triangle->getFigurePerimeter() . "<br>";
echo $triangle->getSurfaceArea() . "<br>";
echo $triangle . "<br>";
$cube = new Cube("Куб", 4);
echo $cube->getVolume() . "<br>";
echo $cube->getSquare() . "<br>";
echo $cube . "<br>";
$rectangularParallelepiped = new RectangularParallelepiped("Прямоугольный параллелограмм", 5, 7, 6);
echo $rectangularParallelepiped->getSquare() . "<br>";
echo $rectangularParallelepiped->getVolume() . "<br>";
echo $rectangularParallelepiped . "<br>";
$array = [];
$array[] = $square;
$array[] = $cube;
$array[] = $rectangularParallelepiped;
foreach ($array as $item) {
    if ($item instanceof VolumeMeasurable) {
        echo "<br>Фигуры, которые являются объёмными: <br> $item";
    }
}



