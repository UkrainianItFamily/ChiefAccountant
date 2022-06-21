<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\News;

final class GetNewsBySlugResponse implements ActionsResponseModelInterface
{
    private News $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function getResponse(): News
    {
        return $this->news;
    }
}
