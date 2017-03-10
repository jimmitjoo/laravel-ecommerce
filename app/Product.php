<?php

namespace App;

use App\Events\ProductDeleted;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $events = [
        'deleted' => ProductDeleted::class
    ];

    public function categories() {
        return $this->belongsToMany('\App\Category');
    }

    public static function getById($id)
    {
        $cacheKey = 'product_' . $id;

        if (Cache::has($cacheKey)) {
            $product = Cache::get($cacheKey);
        } else {
            $product = self::with('categories')->find($id);
            Cache::put($cacheKey, $product, 60);
        }

        return $product;
    }



}
