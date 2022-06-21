<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Contracts\ActionsResponseCollectionInterface;
use Illuminate\Database\Eloquent\Collection;

final class GetAllNewsByTagResponse implements ActionsResponseCollectionInterface
{
    private Collection $news;

    public function __construct(Collection $news)
    {
        $this->news = $news;
    }

    public function getResponse(): Collection
    {
        return $this->news;
    }
}
