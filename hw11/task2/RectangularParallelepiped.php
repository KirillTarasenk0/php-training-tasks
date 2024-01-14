<?php

final class RectangularParallelepiped extends VolumeMeasurable
{
    private int $rectangularParallelepipedLength;
    private int $rectangularParallelepipedWidth;
    private int $rectangularParallelepipedHeight;
    public function __construct(string $figureName, int $rectangularParallelepipedLength, int $rectangularParallelepipedWidth, int $rectangularParallelepipedHeight)
    {
        parent::__construct($figureName);
        $this->rectangularParallelepipedLength = $rectangularParallelepipedLength;
        $this->rectangularParallelepipedWidth = $rectangularParallelepipedWidth;
        $this->rectangularParallelepipedHeight = $rectangularParallelepipedHeight;
    }
    public function getVolume(): int
    {
        return $this->rectangularParallelepipedHeight * $this->rectangularParallelepipedWidth * $this->rectangularParallelepipedLength;
    }
    public function getSquare(): int
    {
        return 2 * ($this->rectangularParallelepipedLength * $this->rectangularParallelepipedWidth + $this->rectangularParallelepipedLength * $this->rectangularParallelepipedHeight + $this->rectangularParallelepipedWidth * $this->rectangularParallelepipedHeight);
    }
    public function __toString(): string
    {
        return "Название фигуры: " . parent::getFigureName() . " Объём фигуры: " . $this->getVolume() . " Площадь фигуры: " . $this->getSquare();
    }
}