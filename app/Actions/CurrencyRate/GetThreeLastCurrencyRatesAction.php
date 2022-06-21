<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

use App\Constant\HomeConstant;
use App\Repositories\CurrencyRate\CurrencyRateRepositoryInterface;
use Carbon\Carbon;

final class GetThreeLastCurrencyRatesAction
{
    private CurrencyRateRepositoryInterface $currencyRateRepositoryInterface;

    public function __construct(CurrencyRateRepositoryInterface $currencyRateRepositoryInterface, GetAllCurrencyRatesByMonthAction $allCurrencyRatesByMonthAction)
    {
        $this->currencyRateRepositoryInterface = $currencyRateRepositoryInterface;
        $this->allCurrencyRatesByMonthAction = $allCurrencyRatesByMonthAction;
    }

    public function execute(): GetThreeLastCurrencyRatesResponse
    {
        $recordCount = HomeConstant::CURRENCY_RATES_PER_PAGE;

        $threeLastRatesCollection = $this->currencyRateRepositoryInterface->getCurrencyRatesByLimit($recordCount);

        foreach ($threeLastRatesCollection as $rate) {
            $threeLastRatesArray[] = [
                'usdRate' => $rate->usd_rate,
                'rubRate' => $rate->rub_rate,
                'eurRate' => $rate->eur_rate,
                'date' => $rate->date,
                ];
        }

        $lastRate = reset($threeLastRatesArray);
        $mainDate = $lastRate['date'];
        $currentDate = Carbon::now()->format('Y-m-d');

        if($currentDate > $mainDate) {
            $currentDate = Carbon::parse($currentDate)->subDay();
        }

        for ($i = $recordCount; $i > 0; $i -= 1) {
            if ($currentDate < $mainDate) {
                $lastRate = next($threeLastRatesArray);
            }

            $threeRatesArray[$i] = [
                'usdRate' => $lastRate['usdRate'],
                'rubRate' => $lastRate['rubRate'],
                'eurRate' => $lastRate['eurRate'],
                'date' => Carbon::parse($currentDate)->format('d.m.Y'),
            ];

            $currentDate = Carbon::parse($currentDate)->subDay();
        }

        return new GetThreeLastCurrencyRatesResponse($threeRatesArray);
    }
}
