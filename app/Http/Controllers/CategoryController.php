<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

    if ($categories->isEmpty()) {
        return response()->json(['message' => 'No categories found'], 200);

    }

    return response()->json($categories);
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
        $request->validate([
            'code' => 'required|string|max:255|unique:categories,code',
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        // Create a new category
        $category = Category::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
        ]);

        return response()->json([
            'message' => 'Category created successfully',
            'data' => $category,
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category);
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
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $request->validate([
            'code' => 'required|string|max:255|unique:categories,code,'. $category->id,
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
        ]);

        return response()->json([
            'message' => 'Category updated successfully',
            'data' => $category,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }

    public function trashed()
    {
        $trashedCategories = Category::onlyTrashed()->get();
        return response()->json($trashedCategories);
    }

    public function restore($id)
{
    $category = Category::onlyTrashed()->find($id);

    if (!$category) {
        return response()->json(['message' => 'Category not found'], 404);
    }

    $category->restore(); // Restores the soft deleted category

    return response()->json(['message' => 'Category restored successfully']);
}
}
