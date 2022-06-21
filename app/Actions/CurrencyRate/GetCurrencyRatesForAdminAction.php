<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

use App\Repositories\CurrencyRate\CurrencyRateRepositoryInterface;
use App\Constant\CurrencyRatesConstant;

final class GetCurrencyRatesForAdminAction
{
    private CurrencyRateRepositoryInterface $currencyRateRepositoryInterface;

    public function __construct(CurrencyRateRepositoryInterface $currencyRateRepositoryInterface)
    {
        $this->currencyRateRepositoryInterface = $currencyRateRepositoryInterface;
    }

    public function execute(): GetCurrencyRatesForAdminResponse
    {
        $currencyRates = $this->currencyRateRepositoryInterface->getCurrencyRatesByLimit(CurrencyRatesConstant::LIMIT);

        return new GetCurrencyRatesForAdminResponse($currencyRates);
    }
}
