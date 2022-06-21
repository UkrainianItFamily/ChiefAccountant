<?php

declare(strict_types=1);

namespace App\Actions\App;

use App\Models\App;
use App\Repositories\App\AppRepositoryInterface;

final class AddAppAction
{
    private AppRepositoryInterface $appRepository;

    public function __construct(AppRepositoryInterface $appRepository)
    {
        $this->appRepository = $appRepository;
    }

    public function execute(): AddAppResponse
    {
        $app = new App();
        $this->appRepository->saveApp($app);

        return new AddAppResponse($app);
    }
}
