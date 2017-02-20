<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories() {
        return $this->belongsToMany('\App\Category');
    }

    public static function getById($id)
    {
        $cacheKey = 'product_' . $id;

        if (Cache::has($cacheKey)) {
            $product = Cache::get($cacheKey);
        } else {
            $product = Product::with('categories')->find($id);
            Cache::put($cacheKey, $product, 60);
        }

        return $product;
    }

}
