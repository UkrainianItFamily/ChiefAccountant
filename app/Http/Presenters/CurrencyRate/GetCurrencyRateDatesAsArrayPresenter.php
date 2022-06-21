<?php

namespace App\Http\Presenters\CurrencyRate;

use App\Contracts\PresenterCollectionInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class GetCurrencyRateDatesAsArrayPresenter implements PresenterCollectionInterface
{
    public function present(Collection $currencyRates): array
    {
        $arrayCurrencyRateDates['years'] = [];
        $arrayCurrencyRateDates['months'] = [];

        foreach ($currencyRates as $currencyRate) {
            $year = Carbon::parse($currencyRate->date)->translatedFormat('Y');
            $month = Carbon::parse($currencyRate->date)->translatedFormat('F');

            if (! in_array($year, $arrayCurrencyRateDates['years'])) {
                $arrayCurrencyRateDates['years'][] = $year;
            }

            if (! in_array($month, $arrayCurrencyRateDates['months'])) {
                $arrayCurrencyRateDates['months'][] = $month;
            }
        }

        return $arrayCurrencyRateDates;
    }

    public function presentCollection(Collection $collection): array
    {
        return $this->present($collection);
    }
}
