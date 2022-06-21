<?php

declare(strict_types=1);

namespace App\Repositories\App;

use App\Models\App;
use Illuminate\Database\Eloquent\Collection;

interface AppRepositoryInterface
{
    public function saveApp(App $app): App;

    public function syncAppWithReports(App $app, array $reportsIdArray): void;

    public function getAppById(int $appId): ?App;

    public function getReportsByApp(App $app): Collection;
}
