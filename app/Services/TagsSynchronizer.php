<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    /**
     * @param Collection $tags
     * @param Model $model
     * @return void
     */
    public function sync(Collection $tags, Model $model)
    {
        $existingTags = $model->tags->keyBy('name');
        $tagsToAttach = $tags->diffKeys($existingTags);
        $syncIds = $existingTags->intersectByKeys($tags)->pluck('id');

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::where('name', $tag)->firstOrCreate(['name' => $tag]);

            $syncIds[] = $tag->id;
        }

        $model->tags()->sync($syncIds);
    }
}
