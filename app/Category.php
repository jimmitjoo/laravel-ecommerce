<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function getById($id)
    {
        $cacheKey = 'category_' . $id;

        if (Cache::has($cacheKey)) {
            $category = Cache::get($cacheKey);
        } else {
            $category = Category::find($id);
            Cache::put($cacheKey, $category, 60);
        }

        return $category;
    }
}
