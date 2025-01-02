<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PrintLabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        return response()->json(['warehouses' => $warehouses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::where('name', 'like', "%$query%")
            ->orWhere('code', 'like', "%$query%")
            ->get();

        if ($results->isEmpty()) {
            return response()->json(['message' => 'No data available'], 404);
        }

        return response()->json(['products' => $results]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function print(Request $request)
    {
        $products = $request->products;
        $paperSize = $request->paper_size;
        $displayPrice = $request->display_price;

        return response()->json([
            'message' => 'Labels generated successfully.',
            'data' => [
                'products' => $products,
                'paper_size' => $paperSize,
                'display_price' => $displayPrice,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($request->id);
        $product->quantity = $request->quantity;
        $product->save();

        return response()->json(['message' => 'Product updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
