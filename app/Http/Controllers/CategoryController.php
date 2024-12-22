<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%$search%")
                ->orWhere('code', 'like', "%$search%");
        }

        if ($request->has(['sort', 'order'])) {
            $query->orderBy($request->input('sort'), $request->input('order'));
        }

        $categories = $query->get();

        if ($categories->isEmpty()) {
            return response()->json(['message' => 'No categories found'], 200);
        }

        return response()->json(['categories' => $categories], 200);
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
            'code' => 'required|string|max:255|unique:categories,code,' . $category->id,
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

        $category->restore();

        return response()->json(['message' => 'Category restored successfully']);
    }
}
