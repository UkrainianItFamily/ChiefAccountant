<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

use App\Contracts\ActionsResponseArrayInterface;

final class GetAllCurrencyRatesByMonthResponse implements ActionsResponseArrayInterface
{
    private array $currencyRates;

    public function __construct(array $currencyRates)
    {
        $this->currencyRates = $currencyRates;
    }

    public function getResponse(): array
    {
        return $this->currencyRates;
    }
}
