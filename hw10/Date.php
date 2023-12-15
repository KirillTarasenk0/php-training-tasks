<?php

class Date
{
    private string $date;
    private int $day;
    private int $month;
    private int $year;
    private int $maxDays = 30;
    private int $maxMonths = 12;
    private array $monthNames = [
        1 => "January",
        2 => "February",
        3 => "March",
        4 => "April",
        5 => "May",
        6 => "June",
        7 => "July",
        8 => "August",
        9 => "September",
        10 => "October",
        11 => "November",
        12 => "December"
    ];
    public function __construct(string $date = null)
    {
        if (!$date || $date === "") {
            $this->date = date("Y.m.d");
        } else {
            $this->date = $date;
        }
        $this->day = $this->splitDate()[2];
        $this->month = $this->splitDate()[1];
        $this->year = $this->splitDate()[0];
    }
    private function splitDate(): array
    {
        return explode(".", $this->date);
    }
    public function getDay(): int
    {
        return $this->day;
    }
    public function getMonth(string $format = 'number'): int|string
    {
        if ($format === 'number') {
            return $this->month;
        } else {
            $wordName = "";
            foreach ($this->monthNames as $key => $value) {
                if ($this->splitDate()[1] == $key) {
                    $wordName = $value;
                }
            }
            return $wordName;
        }
    }
    public function getYear(): int
    {
        return $this->year;
    }
    public function addDay(int $value): void
    {
        if ($value <= $this->maxDays) {
            $this->day += $value;
        }
        if ($this->day > $this->maxDays) {
            $this->month++;
            $this->day -= $this->maxDays;
            if ($this->month === 13) {
                $this->month = 1;
                $this->year++;
            }
        } else {
            echo "Вы ввели недопустимое число. Введите число в диапазоне от 0 до 30. <br>";
        }
    }
    public function subDay(int $value): void
    {
        if ($value <= $this->maxDays) {
            $this->day -= $value;
            if ($this->day === 0) {
                $this->day = 30;
            }
        }
        if ($this->day <= 0) {
            $this->month--;
            if ($this->month <= 0) {
                $this->month = 12;
                $this->year--;
            } else {
                echo "Вы ввели недопустимое число. Введите число в диапазоне от 0 до 30. <br>";
            }
            $this->day = 30 - abs($this->day);
        }
    }
    public function addMonth(int $value): void
    {
        if ($value <= $this->maxMonths && $value > 0) {
            $this->month += $value;
            if ($this->month > $this->maxMonths) {
                $this->year++;
                $this->month = $this->month - $this->maxMonths;
            } else {
                echo "Вы ввели недопустимое число. Введите число в диапазоне от 0 до 12. <br>";
            }
        }
    }
    public function subMonth(int $value): void
    {
        if ($value <= $this->maxMonths && $value > 0) {
            $this->month -= $value;
            if ($this->month <= 0) {
                $monthUpperZero = abs($this->month);
                $this->month = $this->maxMonths - $monthUpperZero;
            }
        } else {
            echo "Вы ввели недопустимое число. Введите число в диапазоне от 0 до 12. <br>";
        }
    }
    public function addYear(int $value): void
    {
        if ($value > 0) {
            $this->year += $value;
        } else {
            echo "Вы ходите добавить число меньше 0. Пожалуйста, повторите ввод. <br>";
        }
    }
    public function subYear(int $value): void
    {
        if ($value > 0) {
            if ($this->getYear() > $value) {
                $this->year -= $value;
            } else {
                echo "Год не может быть меньше вычитаемого значения Пожалуйста, повторите ввод. <br>";
            }
        } else {
            echo "Вы ходите вычесть число меньше 0. Пожалуйста, повторите ввод. <br>";
        }
    }
    public function format(string $format = "string"): void
    {
        if ($format === "string") {
            echo $this->getYear() . " " . $this->getMonth() . " " . $this->getDay() . "<br>";
        } else {
            echo "Год: " . $this->getYear() . "<br>" . "Месяц: " . $this->getMonth() . "<br>" . "День: " . $this->getDay() . "<br>";
        }
    }
    public function __toString(): string
    {
        return $this->getYear() . " " . $this->getMonth() . " " . $this->getDay();
    }
}