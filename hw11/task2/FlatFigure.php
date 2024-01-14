<?php

require_once "Figure.php";
require_once "FlatMeasurable.php";

class FlatFigure extends Figure implements FlatMeasurable
{
    protected array $figureSides = [];
    public function __construct(string $figureName, array $figureSides)
    {
        parent::__construct($figureName);
        $this->figureSides = $figureSides;
    }
    public function getFigurePerimeter(): int
    {
        $perimeter = 0;
        foreach ($this->figureSides as $side) {
            $perimeter += $side;
        }
        return $perimeter;
    }
    public function getSurfaceArea(): int
    {
        return $this->figureSides[0] * $this->figureSides[1];
    }
    public function __toString(): string
    {
        return "Название фигуры: " . parent::getFigureName() . " Периметр фигуры: " . $this->getFigurePerimeter() . " Площадь фигуры: " . $this->getSurfaceArea();
    }
}