<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request){
        $category = $request->query('category');

        $products = Product::query()
        ->when($category, function($query) use ($category) {
            $query->where('category', $category);
        })
        ->where('price', '>', 1000)
        ->get();

        return view('products.index', compact('products'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:1000',
        ]);

        $product = Product::create($validated);

        return redirect('/products')->with('success', 'Product created successfully');
    }

    public function create(){
        return view('products.create');
    }
}
