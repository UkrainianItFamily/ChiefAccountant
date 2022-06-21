<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

class UpdateCurrencyRateRequest
{
    private int $id;
    private string $date;
    private float $usdRate;
    private float $rubRate;
    private float $eurRate;

    public function __construct(
        int $id,
        string $date,
        float $usdRate,
        float $rubRate,
        float $eurRate)
    {
        $this->id = $id;
        $this->date = $date;
        $this->usdRate = $usdRate;
        $this->rubRate = $rubRate;
        $this->eurRate = $eurRate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDate(): string
    {
        return $this->date;
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
}
