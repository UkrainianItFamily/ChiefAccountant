<?php

declare(strict_types=1);

namespace App\Repositories\News;

use App\Models\News;
use App\Models\Tag;
use App\Repositories\BaseRepository;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    public function saveNews(News $news): News
    {
        $news->save();

        return $news;
    }

    public function updateNews(News $news): News
    {
        $news->update();

        return $news;
    }

    public function syncNewsWithTags(News $news, array $tags): void
    {
        $news->tags()->sync($tags);
    }

    public function getNewsById(int $id): ?News
    {
        $itemNews = News::find($id);

        return $itemNews;
    }

    public function getAllNews(): ?Collection
    {
        $news = News::orderBy('id', 'desc')->get();

        return $news;
    }

    public function deleteNews(News $news): void
    {
        $news->delete();
    }

    public function deleteTagsFromNews(News $news): void
    {
        $news->tags()->delete();
    }

    public function getNewsBySlug(string $slug): ?News
    {
        $itemNews = News::firstwhere('slug', '=', $slug);

        return $itemNews;
    }

    public function getAllNewsByTag(Tag $tag): ?Collection
    {
        $collectionNews = $tag->news;

        return $collectionNews;
    }

    public function getNewsByPaginate($perPage): ?LengthAwarePaginator
    {
        $news = News::orderBy('created_at', 'desc')->paginate($perPage);

        return $news;
    }

    public function getNewsByTagPaginate($perPage, $tagName)
    {
        $tagId = Tag::where('name', $tagName)->first();
        $tags = DB::table('news_tag')->where('tag_id', $tagId->id)->select('news_id')->get();

        $news = null;
        $tagArr = [];
        if($tags) {
            foreach ($tags as $tag) {
                $tagArr[] = $tag->news_id;
            }
            $news = News::whereIn('id', $tagArr)->orderBy('created_at', 'desc')->paginate($perPage);
        }

        return $news;
    }
}
