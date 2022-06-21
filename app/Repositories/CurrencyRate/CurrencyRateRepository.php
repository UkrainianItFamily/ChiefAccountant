<?php

declare(strict_types=1);

namespace App\Repositories\CurrencyRate;

use App\Models\CurrencyRate;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class CurrencyRateRepository extends BaseRepository implements CurrencyRateRepositoryInterface
{
    public function save(CurrencyRate $currencyRate): CurrencyRate
    {
        $currencyRate->save();

        return $currencyRate;
    }

    public function update(CurrencyRate $currencyRate): CurrencyRate
    {
        $currencyRate->update();

        return $currencyRate;
    }

    public function getFirstRateOnDb(): ?CurrencyRate
    {
        $currencyRates = CurrencyRate::select('date')->orderBy('date', 'asc')->first();

        return $currencyRates;
    }

    public function getLastRateOnDb(): ?CurrencyRate
    {
        $currencyRates = CurrencyRate::select('date')->orderBy('date', 'desc')->first();

        return $currencyRates;
    }

    public function delete(CurrencyRate $currencyRate): void
    {
        $currencyRate->delete();
    }

    public function getById(int $id): ?CurrencyRate
    {
        $currensyRate = CurrencyRate::find($id);

        return $currensyRate;
    }

    public function getCurrencyRatesByLimit(int $limit): Collection
    {
        $currencyRates = CurrencyRate::orderBy('date', 'desc')->limit($limit)->get();

        return $currencyRates;
    }

    public function getLatestCurrencyRate(): ?CurrencyRate
    {
        $currencyRate = CurrencyRate::orderBy('date', 'desc')->first();

        return $currencyRate;
    }

    public function getRatesOnMonth(string $month): ?Collection
    {
        $currencyRates = CurrencyRate::where('date', 'LIKE', "$month%")->orderBy('date', 'desc')->get();

        return $currencyRates;
    }

    public function getLastRateByMonth(string $date): ?CurrencyRate
    {
        $currencyRate = CurrencyRate::orderBy('date', 'desc')->firstWhere('date','LIKE', $date . '%');

        return $currencyRate;
    }

    public function getRateByDate(string $date): ?CurrencyRate
    {
        $currencyRate = CurrencyRate::withTrashed()->firstwhere('date', $date);

        return $currencyRate;
    }
}
