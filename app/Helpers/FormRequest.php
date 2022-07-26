<?php

namespace App\Helpers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class FormRequest
{
    /**
     * @var array|string[]
     */
    private static array $rule = [
        'title' => 'required|string|min:5|max:100',
        'desc' => 'required|string|max:255',
        'body' => 'required|string',
        'tags' => 'sometimes|string',
        'published' => 'sometimes|accepted',
    ];

    /**
     * @param Request $request
     * @return array
     * @throws ValidationException
     */
    public static function validate(Request $request): array
    {
        $inputToValidate = $request->all();

        if (!self::editionMarker($request)) {
            $inputToValidate += ['slug' => Str::slug(request('title'))];
            self::$rule += ['slug' => 'required|string|unique:articles'];
        }

        $validator = Validator::make($inputToValidate, self::$rule);
        $validator->validate();

        $validatedData = $validator->validated();
        $validatedData['published'] = request('published') === 'on' ? 1 : 0;

        return $validatedData;
    }

    public static function ifArticleWithSlugExists($slug)
    {
        return Article::where('slug', '=', $slug)->exists();
    }

    public static function editionMarker(Request $request) //признак редактирования
    {
        return $request->get('_method') === 'PATCH' && self::ifArticleWithSlugExists($request->get('slug_old'));
    }
}
