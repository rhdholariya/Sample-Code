<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with('productImages')->paginate(5);

        return view('home', compact('products'));
    }

    public function productDetail($id)
    {
        $productDetail = Product::with('productImages')->where('id', $id)->first();

        return view('product_detail', compact('productDetail'));
    }
}
