<?php

class Interval
{
    private Date $date1;
    private Date $date2;
    public function __construct(Date $date1, Date $date2)
    {
        $this->date1 = $date1;
        $this->date2 = $date2;
    }
    public function toDays(): int
    {
        return abs($this->date1->getDay() - $this->date2->getDay());
    }
    public function toMonths(): int
    {
        return abs($this->date1->getMonth() - $this->date2->getMonth());
    }
    public function toYears(): int
    {
        return abs($this->date1->getYear() - $this->date2->getYear());
    }
}