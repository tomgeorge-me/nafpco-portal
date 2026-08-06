<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featured = Product::query()
            ->publicVisible()
            ->latest('updated_at')
            ->take(6)
            ->get();

        $categoryCounts = Product::query()
            ->publicVisible()
            ->selectRaw('category, count(*) as total')
            ->groupBy('category')
            ->pluck('total', 'category');

        //dd($categoryCounts);

        return view('home', [
            'featured' => $featured,
            'categoryCounts' => $categoryCounts,
        ]);
    }
}
