<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products() {
        return $this->belongsToMany('\App\Product');
    }

    public function getById($id)
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

    public static function getByIdWithProducts($id)
    {
        $cacheKey = 'category_' . $id . '_with_products';

        if (Cache::has($cacheKey)) {
            $category = Cache::get($cacheKey);
        } else {
            $category = Category::with('products')->orderBy('name')->find($id);
            Cache::put($cacheKey, $category, 60);
        }

        return $category;
    }

    public static function getAllSortedByName()
    {

        $cacheKey = 'categories';

        if (Cache::has($cacheKey)) {
            $categories = Cache::get($cacheKey);
        } else {
            $categories = Category::orderBy('name')->get();
            Cache::put($cacheKey, $categories, 60);
        }

        return $categories;
    }
}
