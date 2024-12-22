<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        $query = Unit::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
        }

        if ($request->has(['sort', 'order'])) {
            $sort = $request->input('sort');
            $order = $request->input('order', 'asc');
            $query->orderBy($sort, $order);
        }

        $perPage = $request->input('per_page', 10);
        $units = $query->paginate($perPage);

        return response()->json($units, 200);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:units,name',
            'ShortName' => 'required|string|max:100',
            'base_unit' => 'required|integer',
            'operator' => 'required|string|max:10',
            'operator_value' => 'required|numeric',
            'is_active' => 'required|integer|in:0,1',
        ]);

        $unit = Unit::create($validated);

        return response()->json([
            'message' => 'Unit created successfully!',
            'data' => $unit,
        ], 201);
    }

    public function show($id)
    {
        $unit = Unit::findOrFail($id);
        return response()->json($unit);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:units,name,' . $id,
            'ShortName' => 'required|string|max:100',
            'base_unit' => 'required|integer',
            'operator' => 'required|string|max:10',
            'operator_value' => 'required|numeric',
            'is_active' => 'required|integer|in:0,1',
        ]);

        $unit = Unit::findOrFail($id);
        $unit->update($validated);

        return response()->json([
            'message' => 'Unit updated successfully!',
            'data' => $unit,
        ]);
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return response()->json([
            'message' => 'Unit deleted successfully!',
        ]);
    }

}
