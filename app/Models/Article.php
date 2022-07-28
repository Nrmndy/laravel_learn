<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'desc', 'body', 'slug', 'published'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public static function whereSlug($slug)
    {
        return self::where('slug', $slug)->first();
    }
}
