<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\News;

final class UpdateNewsResponse implements ActionsResponseModelInterface
{
    private News $updatedNews;

    public function __construct(News $newNews)
    {
        $this->updatedNews = $newNews;
    }

    public function getResponse(): News
    {
        return $this->updatedNews;
    }
}
