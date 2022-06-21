<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

use App\Repositories\CurrencyRate\CurrencyRateRepositoryInterface;

class DeleteCurrencyRateAction
{
    private CurrencyRateRepositoryInterface $currencyRateRepositoryInterface;

    public function __construct(CurrencyRateRepositoryInterface $currencyRateRepositoryInterface)
    {
        $this->currencyRateRepositoryInterface = $currencyRateRepositoryInterface;
    }

    public function execute(DeleteCurrencyRateRequest $request): void
    {
        $currencyRates = $this->currencyRateRepositoryInterface->getById($request->getId());

        $this->currencyRateRepositoryInterface->delete($currencyRates);
    }
}
