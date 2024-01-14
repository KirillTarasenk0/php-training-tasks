<?php

require_once "FlatFigure.php";

class Triangle extends FlatFigure
{
    public function __construct(string $figureName, array $figureSides)
    {
        parent::__construct($figureName, $figureSides);
    }
    public function getSurfaceArea(): int
    {
        return parent::getSurfaceArea() * 0.5;
    }

}