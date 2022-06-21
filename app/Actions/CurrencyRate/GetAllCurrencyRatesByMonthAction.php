<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

use App\Repositories\CurrencyRate\CurrencyRateRepositoryInterface;
use Carbon\Carbon;

final class GetAllCurrencyRatesByMonthAction
{
    private CurrencyRateRepositoryInterface $currencyRateRepositoryInterface;

    public function __construct(CurrencyRateRepositoryInterface $currencyRateRepositoryInterface)
    {
        $this->currencyRateRepositoryInterface = $currencyRateRepositoryInterface;
    }

    public function execute(GetAllCurrencyRatesByMonthRequest $request): GetAllCurrencyRatesByMonthResponse
    {
        $year = $request->getYear();
        $month = $request->getMonth();
        $selectedPeriod = Carbon::createFromDate($year, $month);

        $ratesOnMonth = $this->currencyRateRepositoryInterface->getRatesOnMonth($selectedPeriod->format('Y-m'));

        foreach ($ratesOnMonth as $rate) {
            $dayOnMonth = (int) Carbon::parse($rate->date)->format('d');
            $currentMonthArray[$dayOnMonth] = [
                'usdRate' => $rate->usd_rate,
                'rubRate' => $rate->rub_rate,
                'eurRate' => $rate->eur_rate,
                'date' => Carbon::parse($rate->date)->format('d.m.Y'),
            ];
        }

        if (isset($currentMonthArray[1])) {
            $arrayLastRate = $currentMonthArray[1];
        } else {
            $prevMonth = ($selectedPeriod)->subMonth(1);
            $modelLastRate = $this->currencyRateRepositoryInterface->getLastRateByMonth($prevMonth->format('Y-m'));

            $arrayLastRate = [
                'usdRate' => $modelLastRate->usd_rate,
                'rubRate' => $modelLastRate->rub_rate,
                'eurRate' => $modelLastRate->eur_rate,
                'date' => $modelLastRate->date,
            ];
        }

        $currentMonth = Carbon::now()->format('m');
        $selectedPeriod = Carbon::createFromDate($year, $month);
        $currencyRateDate = $selectedPeriod->format('m.Y');

        if ($currentMonth === $selectedPeriod->format('m')) {
            $lastDate = Carbon::now()->format('d');
        } else {
            $lastDate = (new Carbon('last day of '.$selectedPeriod))->format('d');
        }
        for ($i = 1; $i <= $lastDate; $i++) {
            if (isset($currentMonthArray[$i])) {
                $arrayLastRate = $monthArray[$i] = $currentMonthArray[$i];
            } else {
                $monthArray[$i] = $arrayLastRate;
                $monthArray[$i]['date'] = $i.'.'.$currencyRateDate;
            }
        }

        $currentDay = Carbon::now()->format('d');

        if ((array_key_first($currentMonthArray) != $currentDay) && ($currentMonth == $selectedPeriod->format('m'))) {
            array_pop($monthArray);
        }

        krsort($monthArray);

        return new GetAllCurrencyRatesByMonthResponse($monthArray);
    }
}
