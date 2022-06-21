<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

use App\Repositories\CurrencyRate\CurrencyRateRepositoryInterface;

final class UpdateCurrencyRateAction
{
    private CurrencyRateRepositoryInterface $currencyRateRepositoryInterface;

    public function __construct(CurrencyRateRepositoryInterface $currencyRateRepositoryInterface)
    {
        $this->currencyRateRepositoryInterface = $currencyRateRepositoryInterface;
    }

    public function execute(UpdateCurrencyRateRequest $request): UpdateCurrencyRateResponse
    {
        $updatedCurrencyRates = $this->currencyRateRepositoryInterface->getById($request->getId());

        $updatedCurrencyRates->usd_rate = $request->getUsdRate();
        $updatedCurrencyRates->rub_rate = $request->getRubRate();
        $updatedCurrencyRates->eur_rate = $request->getEurRate();
        $updatedCurrencyRates->date = $request->getDate();

        $this->currencyRateRepositoryInterface->update($updatedCurrencyRates);

        return new UpdateCurrencyRateResponse($updatedCurrencyRates);
    }
}
