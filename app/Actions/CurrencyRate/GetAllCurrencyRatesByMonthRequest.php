<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

class GetAllCurrencyRatesByMonthRequest
{
    private string $year;
    private string $month;

    public function __construct(
        string $year,
        string $month
    ) {
        $this->year = $year;
        $this->month = $month;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function getMonth(): string
    {
        return $this->month;
    }
}
