<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\CurrencyRate;

final class AddCurrencyRateResponse implements ActionsResponseModelInterface
{
    private CurrencyRate $currencyRate;

    public function __construct(CurrencyRate $currencyRate)
    {
        $this->currencyRate = $currencyRate;
    }

    public function getResponse(): CurrencyRate
    {
        return $this->currencyRate;
    }
}
