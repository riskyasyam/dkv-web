<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index(): View
    {
        $products = Schema::hasTable('products')
            ? Product::latest()->take(6)->get()
            : collect();

        return view('landing', compact('products'));
    }
}
