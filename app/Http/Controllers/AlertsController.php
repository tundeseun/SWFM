<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Product;

class AlertsController extends Controller
{
    public function getExpirationAlerts()
    {
        $currentDate = Carbon::now();
        $threeMonthsLater = $currentDate->copy()->addMonths(3);

        $alerts = Product::where('is_active', 1)
            ->whereBetween('created_at', [$currentDate, $threeMonthsLater])
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($alerts);
    }

    public function resolveExpirationAlert($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->update(['is_active' => 0]); // Example of marking as resolved
        return response()->json(['message' => 'Expiration alert resolved']);
    }

    public function getSeasonalAlerts()
    {
        $currentMonth = Carbon::now()->month;
        $nineMonthsLater = ($currentMonth + 9) % 12;

        $alerts = Product::where('is_seasonal', 1)
            ->whereBetween('seasonal_month', [$currentMonth, $nineMonthsLater])
            ->orderBy('seasonal_month', 'asc')
            ->get();

        return response()->json($alerts);
    }

    public function resolveSeasonalAlert($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->update(['is_active' => 0]); // Example of marking as resolved
        return response()->json(['message' => 'Seasonal alert resolved']);
    }

    public function getLowStockAlerts()
    {
        $alerts = Product::where('stock_alert', '>', 0)
            ->whereRaw('stock_alert > (SELECT SUM(qte) FROM product_warehouse WHERE product_id = products.id)')
            ->get();

        return response()->json($alerts);
    }

    public function resolveLowStockAlert($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->update(['is_active' => 0]); // Example of marking as resolved
        return response()->json(['message' => 'Low stock alert resolved']);
    }
}

