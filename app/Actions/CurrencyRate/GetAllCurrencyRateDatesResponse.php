<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

use App\Contracts\ActionsResponseArrayInterface;

final class GetAllCurrencyRateDatesResponse implements ActionsResponseArrayInterface
{
    private array $currencyRateDates;

    public function __construct(array $currencyRateDates)
    {
        $this->currencyRateDates = $currencyRateDates;
    }

    public function getResponse(): array
    {
        return $this->currencyRateDates;
    }
}
