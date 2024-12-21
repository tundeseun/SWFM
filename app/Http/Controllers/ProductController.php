<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Models\Product;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function store(Request $request)
{
    // Validate input data
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'Type_barcode' => 'nullable|string|max:100',
        'code' => 'required|string|unique:products,code|max:100',
        'category_id' => 'required|exists:categories,id',
        'brand_id' => 'nullable|exists:brands,id',
        'unit_id' => 'nullable|exists:units,id',
        'taxNet' => 'nullable|numeric',
        'tax_method' => 'nullable|string|in:inclusive,exclusive',
        'description' => 'nullable|string',
        'type' => 'nullable|string',
        'product_unit' => 'nullable|string|max:50',
        'sale_unit' => 'nullable|string|max:50',
        'purchase_unit' => 'nullable|string|max:50',
        'stock_alert' => 'nullable|numeric',
        'is_variant' => 'nullable|boolean',
        'is_imei' => 'nullable|boolean',
        'is_active' => 'nullable|boolean',
        'bulk_weight' => 'nullable|numeric',
        'individual_weight' => 'nullable|numeric',
        'is_seasonal' => 'nullable|boolean',
        'seasonal_month' => 'nullable|integer|min:1|max:12',
        'shelf_id' => 'nullable|integer|exists:shelves,id',
        'not_selling' => 'nullable|boolean',
    ]);

    // If validation fails, return the error messages
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $data = $request->all();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('images', 'public');
        $data['image'] = $imagePath;
    }

    if (!isset($data['seasonal_month'])) {
        $data['seasonal_month'] = null;
    }

    $product = Product::create([
        'name' => $data['name'],
        'code' => $data['code'],
        'Type_barcode' => $data['Type_barcode'],
        'category_id' => $data['category_id'],
        'brand_id' => $data['brand_id'] ?? null,
        'product_unit_id' => $data['product_unit_id'] ?? null,
        'order_tax' => $data['taxNet'],
        'tax_method' => $data['tax_method'],
        'description' => $data['description'],
        'type' => $data['type'],
        'sale_unit' => $data['sale_unit'],
        'purchase_unit' => $data['purchase_unit'],
        'stock_alert' => $data['stock_alert'],
        'is_variant' => $data['is_variant'],
        'is_imei' => $data['is_imei'],
        'is_active' => $data['is_active'],
        'note' => $data['note'],
        'bulk_weight' => $data['bulk_weight'],
        'individual_weight' => $data['individual_weight'],
        'is_seasonal' => $data['is_seasonal'],
        'seasonal_month' => $data['seasonal_month'],
        'shelf_id' => $data['shelf_id'],
        'not_selling' => $data['not_selling'],
        'image' => $data['image'],
    ]);

    // Return the success response with created product details
    return response()->json([
        'message' => 'Product created successfully.',
        'product' => $product,
    ], 201);
}

public function index(Request $request)
{
    $query = Product::query();

    if ($request->filled('code')) {
        $query->where('code', 'like', '%' . $request->code . '%');
    }
    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }
    if ($request->filled('category')) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->category . '%');
        });
    }
    if ($request->filled('brand')) {
        $query->whereHas('brand', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->brand . '%');
        });
    }

    $products = $query->with(['brand', 'category', 'unit'])->paginate(10);

    $data = $products->map(function ($product) {
        return [
            'id' => $product->id,
            'image' => $product->image,
            'name' => $product->name,
            'code' => $product->code,
            'brand' => $product->brand->name ?? null,
            'category' => $product->category->name ?? null,
            'unit' => $product->unit->name ?? null,
            'quantity' => $product->quantity,
            'action' => [
                'view_url' => url("/api/products/{$product->id}"),
                'update_url' => url("/api/products/{$product->id}"),
                'delete_url' => url("/api/products/{$product->id}")
            ],
        ];
    });

    return response()->json([
        'message' => 'Products retrieved successfully',
        'data' => $data,
        'pagination' => [
            'total' => $products->total(),
            'per_page' => $products->perPage(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
        ],
    ]);
}


    public function show($id)
    {
        $product = Product::with(['brand', 'category', 'unit'])->findOrFail($id);

        return response()->json([
            'message' => 'Product retrieved successfully',
            'data' => [
                'id' => $product->id,
                'image' => $product->image,
                'name' => $product->name,
                'code' => $product->code,
                'brand' => $product->brand->name ?? null,
                'category' => $product->category->name ?? null,
                'unit' => $product->unit->name ?? null,
                'quantity' => $product->quantity,
            ],
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'image' => 'nullable|image|max:2048',
            'name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:50|unique:products,code,' . $id,
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'nullable|exists:categories,id',
            'unit_id' => 'nullable|exists:units,id',
            'quantity' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product-images', 'public');
            $product->image = $imagePath;
        }

        $product->update($validated);

        return response()->json([
            'message' => 'Product updated successfully!',
            'data' => $product,
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully!',
        ]);
    }

    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:csv,xls,xlsx',
    ]);

    try {
        Excel::import(new ProductsImport, $request->file('file'));

        return response()->json(['message' => 'Products imported successfully.'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error importing file: ' . $e->getMessage()], 500);
    }
}

public function exportToExcel()
{
    return Excel::download(new ProductsExport, 'products.xlsx');
}

public function exportToPDF()
{
    $products = Product::with(['brand', 'category', 'unit'])->get();
    $pdf = PDF::loadView('exports.products_pdf', compact('products'));

    return $pdf->download('products.pdf');
}
}
