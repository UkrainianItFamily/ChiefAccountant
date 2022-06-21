<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

class AddCurrencyRateRequest
{
    private float $usdRate;
    private float $rubRate;
    private float $eurRate;
    private string $date;

    public function __construct(
        float $usdRate,
        float $rubRate,
        float $eurRate,
        string $date
    )
    {
        $this->usdRate = $usdRate;
        $this->rubRate = $rubRate;
        $this->eurRate = $eurRate;
        $this->date = $date;
    }

    public function getUsdRate(): float
    {
        return $this->usdRate;
    }

    public function getRubRate(): float
    {
        return $this->rubRate;
    }

    public function getEurRate(): float
    {
        return $this->eurRate;
    }

    public function getDate(): string
    {
        return $this->date;
    }
}
