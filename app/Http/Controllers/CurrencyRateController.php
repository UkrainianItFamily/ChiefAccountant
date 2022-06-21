<?php

namespace App\Http\Controllers;

use App\Actions\CurrencyRate\GetAllCurrencyRatesByMonthAction;
use App\Actions\CurrencyRate\GetAllCurrencyRatesByMonthRequest;
use App\Actions\CurrencyRate\GetAllCurrencyRateDatesAction;

class CurrencyRateController extends Controller
{
    public function getAllCurrencyRatesPage(GetAllCurrencyRateDatesAction $allCurrencyRateDatesAction)
    {
        $dates = $allCurrencyRateDatesAction->execute()->getResponse();

        return view('pages.currencyRate.currency-list-page', ['dataDates' => $dates]);
    }
    public function getAllCurrencyRates(GetAllCurrencyRatesByMonthAction $getAllCurrencyRatesAction, string $year, string $month)
    {
        $currencyRates = $getAllCurrencyRatesAction->execute(
            New GetAllCurrencyRatesByMonthRequest(
                (int) $year,
                (int) $month
            )
        )->getResponse();

        return response()->json($currencyRates);
    }
}
