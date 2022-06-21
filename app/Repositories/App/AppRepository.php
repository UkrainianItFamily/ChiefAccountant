<?php

declare(strict_types=1);

namespace App\Repositories\App;

use App\Models\App;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class AppRepository extends BaseRepository implements AppRepositoryInterface
{
    public function saveApp(App $app): App
    {
        $app->save();

        return $app;
    }

    public function syncAppWithReports(App $app, array $reportsIdArray): void
    {
        $app->reports()->sync($reportsIdArray);
    }

    public function getAppById(int $appId): ?App
    {
        $app = App::find($appId);

        return $app;
    }

    public function getReportsByApp(App $app): Collection
    {
        $reportsCollection = $app->reports;

        return $reportsCollection;
    }
}
