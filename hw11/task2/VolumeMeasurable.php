<?php

require_once "Figure.php";
require_once "VolumeCountable.php";

class VolumeMeasurable extends Figure implements VolumeCountable
{
    private int $edgeLength;
    public function __construct(string $figureName, int $edgeLength = 0)
    {
        parent::__construct($figureName);
        $this->edgeLength = $edgeLength;
    }
    public function getVolume(): int
    {
        return $this->edgeLength * 3;
    }
    public function getSquare(): int
    {
        return pow($this->edgeLength, 2) * 6;
    }
    public function __toString(): string
    {
        return "Название фигуры: " . parent::getFigureName() . " Длина стороны фигуры: " . $this->edgeLength . " Объём фигуры: " . $this->getVolume() . " Площадь фигуры: " . $this->getSquare();
    }
}