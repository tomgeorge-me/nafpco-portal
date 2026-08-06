<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->query('category', 'all');

        $products = Product::query()
            ->publicVisible()
            ->category($category)
            ->orderBy('name')
            ->paginate(9)
            ->withQueryString();

        //echo '<pre>';

        // dd($products); // Debugging line to inspect the $products variable

        //die(); // Stop execution to see the output of var_dump

        #$categories = config('company.product_categories');

        $categories = Product::query()
            ->publicVisible()
            ->select('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        #dd($categories, $testCats); // Debugging line to inspect the $categories variable

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'activeCategory' => $category,
        ]);
    }

    public function show(string $slug): View
    {
        $product = Product::query()
            ->publicVisible()
            ->where('slug', $slug)
            ->firstOrFail();

        $related = Product::query()
            ->publicVisible()
            ->where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(3)
            ->get();

        return view('products.show', [
            'product' => $product,
            'related' => $related,
        ]);
    }
}
