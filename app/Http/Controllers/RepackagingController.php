<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RepackagingBatch;
use App\Models\RepackagingRule;
use Illuminate\Http\Request;

class RepackagingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function manageRepackaging(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'sizes' => 'required|array',
            'sizes.*' => 'numeric|min:1',
        ]);

        foreach ($request->sizes as $size) {
            RepackagingRule::updateOrCreate([
                'product_id' => $request->product_id,
                'size' => $size,
            ]);
        }

        return response()->json(['message' => 'Repackaging rules updated successfully'], 200);
    }

    // public function startRepackaging(Request $request)
    // {
    //     $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'original_quantity' => 'required|numeric|min:1',
    //         'sizes' => 'required|array',
    //         'sizes.*.size' => 'numeric|min:1',
    //         'sizes.*.quantity' => 'numeric|min:1',
    //     ]);

    //     $totalWeight = array_reduce($request->sizes, function ($carry, $item) {
    //         return $carry + ($item['size'] * $item['quantity']);
    //     }, 0);

    //     $originalWeight = Product::find($request->product_id)->quantity * $request->original_quantity;

    //     if ($totalWeight != $originalWeight) {
    //         return response()->json(['error' => 'Repackaged total weight must match original weight'], 422);
    //     }

    //     $batch = RepackagingBatch::create([
    //         'product_id' => $request->product_id,
    //         'original_quantity' => $request->original_quantity,
    //         'total_weight' => $totalWeight,
    //         'status' => 'in progress',
    //         'started_at' => now(),
    //     ]);

    //     foreach ($request->sizes as $sizeDetail) {
    //         $batch->details()->create([
    //             'size' => $sizeDetail['size'],
    //             'quantity' => $sizeDetail['quantity'],
    //         ]);
    //     }

    //     return response()->json(['message' => 'Repackaging batch started successfully'], 201);
    // }

    public function startRepackaging(Request $request)
{
    return response()->json(['message' => 'Start Repackaging API is working!', 'data' => $request->all()], 200);
}

    public function updateStatus(Request $request)
    {
        $request->validate([
            'batch_id' => 'required|exists:repackaging_batches,id',
            'status' => 'required|in:in progress,completed',
        ]);

        $batch = RepackagingBatch::find($request->batch_id);
        $batch->update([
            'status' => $request->status,
            'completed_at' => $request->status === 'completed' ? now() : null,
        ]);

        return response()->json(['message' => 'Repackaging status updated successfully'], 200);
    }

    public function viewRepackaging(Request $request)
    {
        $batches = RepackagingBatch::with('details', 'product')->get();

        return response()->json(['batches' => $batches], 200);
    }

}
