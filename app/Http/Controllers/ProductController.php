<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'bulk_unit' => 'required|string',
            'individual_unit' => 'required|string',
            'bulk_weight' => 'required|numeric',
            'individual_weight' => 'required|numeric',
            'is_seasonal' => 'boolean',
            'season_month' => 'nullable|string',
            'shelf_id' => 'required|exists:shelves,id',
            'picture' => 'nullable|image|max:2048',
        ]);

        $product = new Product($request->all());

        if ($request->hasFile('picture')) {
            $product->picture_path = $request->file('picture')->store('product_pictures', 'public');
        }

        $product->save();

        return response()->json($product, 201);
    }

    public function index()
    {
        $products = Product::with('shelf')->get();
        return response()->json($products);
    }
}
