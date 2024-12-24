<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return response()->json(Type::all());
    }

    // Store - Create a new type
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:types,name',
            'description' => 'required|string|max:1000',
        ]);

        $type = Type::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return response()->json([
            'message' => 'Type created successfully',
            'data' => $type,
        ], 201);
    }

    // Show - Get a single type
    public function show($id)
    {
        $type = Type::find($id);
        if ($type) {
            return response()->json($type);
        } else {
            return response()->json(['message' => 'Type not found'], 404);
        }
    }

    // Update - Update a type
    public function update(Request $request, $id)
    {
        $type = Type::find($id);
        if ($type) {
            $type->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);
            return response()->json([
                'message' => 'Type updated successfully',
                'data' => $type,
            ]);
        } else {
            return response()->json(['message' => 'Type not found'], 404);
        }
    }

    // Destroy - Soft delete a type
    public function destroy($id)
    {
        $type = Type::find($id);
        if ($type) {
            $type->delete();
            return response()->json([
                'message' => 'Type deleted successfully',
            ]);
        } else {
            return response()->json(['message' => 'Type not found'], 404);
        }
    }
}

