<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\CurrencyRate;

final class UpdateCurrencyRateResponse implements ActionsResponseModelInterface
{
    private CurrencyRate $updatedCurrencyRates;

    public function __construct(CurrencyRate $updatedCurrencyRates)
    {
        $this->updatedCurrencyRates = $updatedCurrencyRates;
    }

    public function getResponse(): CurrencyRate
    {
        return $this->updatedCurrencyRates;
    }
}
