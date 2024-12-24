<?php

namespace App\Http\Controllers;

use App\Models\TaxType;
use Illuminate\Http\Request;

class TaxTypeController extends Controller
{
    public function index()
    {
        $taxTypes = TaxType::all();
        return response()->json($taxTypes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tax_types,name',
            'description' => 'nullable|string',
        ]);

        $taxType = TaxType::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return response()->json([
            'message' => 'Tax Type created successfully',
            'data' => $taxType,
        ], 201);
    }

    public function show($id)
    {
        $taxType = TaxType::findOrFail($id);
        return response()->json($taxType);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tax_types,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $taxType = TaxType::findOrFail($id);
        $taxType->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return response()->json([
            'message' => 'Tax Type updated successfully',
            'data' => $taxType,
        ]);
    }

    public function destroy($id)
    {
        $taxType = TaxType::findOrFail($id);
        $taxType->delete();

        return response()->json([
            'message' => 'Tax Type deleted successfully',
        ]);
    }
}
