<?php

namespace App\Http\Controllers;

use App\Models\WarehouseInventory;
use Illuminate\Http\Request;

class WarehouseInventoryController extends Controller
{
    public function index()
    {
        $warehouseItems = WarehouseInventory::all();

        return response()->json([
            'success' => true,
            'data' => $warehouseItems,
        ]);
    }
}
