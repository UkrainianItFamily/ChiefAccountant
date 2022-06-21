<?php

declare(strict_types=1);

namespace App\Repositories\CurrencyRate;

use App\Models\CurrencyRate;
use Illuminate\Database\Eloquent\Collection;

interface CurrencyRateRepositoryInterface
{
    public function getById(int $id): ?CurrencyRate;

    public function update(CurrencyRate $currencyRate): CurrencyRate;

    public function getCurrencyRatesByLimit(int $limit): Collection;

    public function getFirstRateOnDb(): ?CurrencyRate;

    public function getLastRateOnDb(): ?CurrencyRate;

    public function save(CurrencyRate $currencyRate): CurrencyRate;

    public function getLatestCurrencyRate(): ?CurrencyRate;

    public function getRatesOnMonth(string $month): ?Collection;

    public function getLastRateByMonth(string $date): ?CurrencyRate;

    public function getRateByDate(string $date): ?CurrencyRate;
}
