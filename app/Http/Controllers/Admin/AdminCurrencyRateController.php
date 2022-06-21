<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CurrencyRate\AddCurrencyRateAction;
use App\Actions\CurrencyRate\AddCurrencyRateRequest;
use App\Actions\CurrencyRate\DeleteCurrencyRateAction;
use App\Actions\CurrencyRate\DeleteCurrencyRateRequest;
use App\Actions\CurrencyRate\GetCurrencyRatesForAdminAction;
use App\Actions\CurrencyRate\UpdateCurrencyRateAction;
use App\Actions\CurrencyRate\UpdateCurrencyRateRequest;
use App\Http\Controllers\Controller;
use App\Http\Presenters\CurrencyRate\GetCurrencyRatesAsArrayPresenter;
use App\Http\Requests\CurrencyRate\CreateCurrencyRateValidateRequest;
use App\Http\Requests\CurrencyRate\UpdateCurrencyRateValidateRequest;

class AdminCurrencyRateController extends Controller
{
    public function getAllCurrencyAdmin(GetCurrencyRatesForAdminAction $getCurrencyRatesForAdminAction, GetCurrencyRatesAsArrayPresenter $presenterCurrensyRates)
    {
        $currencyRates = $getCurrencyRatesForAdminAction->execute()->getResponse();

        return view('pages.admin.currencyRate.currency-page', ['dataCurrencys' => $presenterCurrensyRates->presentCollection($currencyRates)]);
    }

    public function createCurrency(AddCurrencyRateAction $addCurrencyRateAction, CreateCurrencyRateValidateRequest $request)
    {
        $newCurrencyRate = $addCurrencyRateAction->execute(
            new AddCurrencyRateRequest(
                $request->input('usd'),
                $request->input('rub'),
                $request->input('eur'),
                $request->input('date'),
            )
        )->getResponse();

        return $this->successResponseRedirect('Успешно сохранено', 'admin.getAllCurrencys');
    }

    public function updateCurrency(UpdateCurrencyRateAction $updateCurrencyRateAction, UpdateCurrencyRateValidateRequest $request, string $id)
    {
        $updatedCurrencyRate = $updateCurrencyRateAction->execute(
            new UpdateCurrencyRateRequest(
                (int) $id,
                $request->input('date'),
                $request->input('usd'),
                $request->input('rub'),
                $request->input('eur'),

            )
        )->getResponse();

        return $this->successResponseRedirect('Успешно сохранено', 'admin.getAllCurrencys');
    }

    public function destroyCurrency(DeleteCurrencyRateAction $deleteCurrencyRateAction, string $id)
    {
        $deleteCurrencyRateAction->execute(
            new DeleteCurrencyRateRequest((int) $id)
        );

        return $this->successResponseRedirect('Успешно удалено', 'admin.getAllCurrencys');
    }
}
