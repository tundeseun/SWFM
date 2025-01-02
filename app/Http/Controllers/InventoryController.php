<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Purchase::with('product.shelf')
            ->selectRaw('product_id, SUM(quantity_bulk) as quantity_bulk, SUM(quantity_units) as quantity_units, MAX(supply_date) as last_supply_date')
            ->groupBy('product_id')
            ->get();

        return response()->json($inventory);
    }
}
