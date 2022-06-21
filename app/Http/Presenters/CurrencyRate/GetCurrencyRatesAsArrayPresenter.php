<?php

namespace App\Http\Presenters\CurrencyRate;

use App\Contracts\PresenterCollectionInterface;
use App\Models\CurrencyRate;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class GetCurrencyRatesAsArrayPresenter implements PresenterCollectionInterface
{
    public function present(CurrencyRate $currencyRate): array
    {
        (array)$arrayCurrencyRates = [
            'id' => $currencyRate->getId(),
            'usd_rate' => $currencyRate->getUsdRate(),
            'rub_rate' => $currencyRate->getRubRate(),
            'eur_rate' => $currencyRate->getEurRate(),
            'date' => $currencyRate->getDate(),
            'formatDate' => Carbon::parse($currencyRate->getDate())->translatedFormat('d.m.Y'),
        ];
        return $arrayCurrencyRates;
    }

    public function presentCollection(Collection $collection): array
    {
        return $collection
            ->map(
                function (CurrencyRate $currencyRate) {
                    return $this->present($currencyRate);
                }
            )
            ->all();
    }
}
