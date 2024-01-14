<?php

abstract class Figure
{
    private string $figureName;
    public function __construct(string $figureName)
    {
        $this->figureName = $figureName;
    }
    public function getFigureName(): string
    {
        return $this->figureName;
    }
}