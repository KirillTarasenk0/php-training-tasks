<?php

require_once "FlatFigure.php";

final class Square extends FlatFigure
{
    public function __construct(string $figureName, array $figureSides)
    {
        parent::__construct($figureName, $figureSides);
    }
}