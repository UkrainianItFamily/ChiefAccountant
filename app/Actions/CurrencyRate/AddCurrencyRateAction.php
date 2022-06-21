<?php

declare(strict_types=1);

namespace App\Actions\CurrencyRate;

use App\Models\CurrencyRate;
use App\Repositories\CurrencyRate\CurrencyRateRepositoryInterface;

final class AddCurrencyRateAction
{
    private CurrencyRateRepositoryInterface $currencyRateRepositoryInterface;

    private UpdateCurrencyRateAction $updateCurrencyRateAction;

    public function __construct(CurrencyRateRepositoryInterface $currencyRateRepositoryInterface, UpdateCurrencyRateAction $updateCurrencyRateAction)
    {
        $this->currencyRateRepositoryInterface = $currencyRateRepositoryInterface;

        $this->updateCurrencyRateAction = $updateCurrencyRateAction;
    }

    public function execute(AddCurrencyRateRequest $request): AddCurrencyRateResponse
    {
        $rateInDb = $this->currencyRateRepositoryInterface->getRateByDate($request->getDate());

        if ($rateInDb) {
            if ($rateInDb->getDeletedAt()) {
                $rateInDb->restore();
            }

            $newCurrencyRates = $this->updateCurrencyRateAction->execute(
                new UpdateCurrencyRateRequest(
                    $rateInDb->getId(),
                    $rateInDb->getDate(),
                    $request->getUsdRate(),
                    $request->getRubRate(),
                    $request->getEurRate(),
                )
            )->getResponse();
        } else {
            $newCurrencyRates = new CurrencyRate();

            $newCurrencyRates->usd_rate = $request->getUsdRate();
            $newCurrencyRates->rub_rate = $request->getRubRate();
            $newCurrencyRates->eur_rate = $request->getEurRate();
            $newCurrencyRates->date = $request->getDate();

            $newCurrencyRates = $this->currencyRateRepositoryInterface->save($newCurrencyRates);
        }

        return new AddCurrencyRateResponse($newCurrencyRates);
    }
}
