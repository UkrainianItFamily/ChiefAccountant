<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

use App\Contracts\ActionsResponseCollectionInterface;
use Illuminate\Database\Eloquent\Collection;

final class GetCurrencyRatesForAdminResponse implements ActionsResponseCollectionInterface
{
    private Collection $currencyRates;

    public function __construct(Collection $currencyRates)
    {
        $this->currencyRates = $currencyRates;
    }

    public function getResponse(): Collection
    {
        return $this->currencyRates;
    }
}
