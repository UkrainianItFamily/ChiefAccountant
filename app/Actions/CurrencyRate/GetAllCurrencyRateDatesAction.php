<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

use App\Repositories\CurrencyRate\CurrencyRateRepositoryInterface;
use Carbon\Carbon;

final class GetAllCurrencyRateDatesAction
{
    private CurrencyRateRepositoryInterface $currencyRateRepositoryInterface;

    public function __construct(CurrencyRateRepositoryInterface $currencyRateRepositoryInterface)
    {
        $this->currencyRateRepositoryInterface = $currencyRateRepositoryInterface;
    }

    public function execute(): GetAllCurrencyRateDatesResponse
    {
        $firstRateOnDb = $this->currencyRateRepositoryInterface->getFirstRateOnDb();
        $lastRateOnDb = $this->currencyRateRepositoryInterface->getLastRateOnDb();

        $startYear = (int) Carbon::parse($firstRateOnDb->getDate())->format('Y');
        $endYear = (int) Carbon::parse($lastRateOnDb->getDate())->format('Y');

        for ($i = $startYear; $i <= $endYear; $i++) {
            $dates['years'][] = $i;
        }

        arsort($dates['years']);

        for ($i = 1; $i <= 12; $i++) {
            $dates['months'][$i] = Carbon::create()->month($i)->translatedFormat('F');
        }

        $currentDate = Carbon::now();
        $dates['currentDate']['year'] = $currentDate->format('Y');
        $dates['currentDate']['month'] = $currentDate->format('m');

        ksort($dates['months']);

        return new GetAllCurrencyRateDatesResponse($dates);
    }
}
