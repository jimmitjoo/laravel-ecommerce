<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['publicIndex', 'publicShow', 'apiLatest']);
    }

    public function apiLatest()
    {
        $products = Product::latest()->paginate();

        return $products;
    }

    public function publicIndex()
    {
        $products = Product::latest()->paginate();

        return view('frontend.products.index')->with(['products' => $products]);
    }

    public function publicShow($id)
    {
        $product = Product::getById($id);

        return view('frontend.products.show', ['product' => $product]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::latest()->paginate();

        return view('products.index')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        if (is_array($request->categories)) {
            $product->categories()->sync($request->categories, true);

            foreach ($request->categories as $category_id) {
                $cacheKey = 'category_' . $category_id . '_with_products';
                Cache::forget($cacheKey);
            }

        } else {
            $product->categories()->detach();
        }

        return redirect(route('admin.products.show', ['id' => $product->id]));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::getAllSortedByName();
        $product = Product::getById($id);

        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::getAllSortedByName();
        $product = Product::getById($id);

        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        Cache::forget('product_' . $id);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        if (is_array($request->categories)) {
            $product->categories()->sync($request->categories, true);

            foreach ($request->categories as $category_id) {
                $cacheKey = 'category_' . $category_id . '_with_products';
                Cache::forget($cacheKey);
            }

        } else {
            $product->categories()->detach();
        }

        return redirect(route('admin.products.show', ['id' => $product->id]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::getById($id);
        $product->delete();

        return response(redirect()->back());
    }
}
