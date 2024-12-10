<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
{
    $orders = PurchaseOrder::with('store')->get();
    return response()->json($orders);
}

public function show($id)
{
    $order = PurchaseOrder::with(['items', 'store'])->findOrFail($id);
    return response()->json($order);
}

public function fulfillOrder(Request $request, $id)
{
    $request = PurchaseOrder::findOrFail($id);
    $request->status = 'Fulfilled';
    $request->save();

    return response()->json(['message' => 'Order moved to fulfillment']);
}

}
