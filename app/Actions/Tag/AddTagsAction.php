<?php

declare(strict_types=1);

namespace App\Actions\Tag;

use App\Repositories\Tag\TagRepositoryInterface;
use Illuminate\Support\Str;

final class AddTagsAction
{
    private TagRepositoryInterface $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function execute(AddTagsRequest $request): AddTagsResponse
    {
        $tagsArray = explode(',', $request->getTags());

        foreach ($tagsArray as $tag) {
            $tagName = $tag;
            $tagSlug = Str::slug($tag);
            $itemTag = $this->tagRepository->addTag($tagName, $tagSlug);
            $tagsIdArray[] = $itemTag->id;
        }

        return new AddTagsResponse($tagsIdArray);
    }

    public function getTagsArr($tags, $param): string
    {
        $tagName = '';
        foreach ($tags as $tag) {
            $tagName .= $tag->$param . ',';
        }

        return substr($tagName,0,-1);
    }
}
