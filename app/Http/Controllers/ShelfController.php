<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $shelf = Shelf::create($request->all());

        return response()->json($shelf, 201);
    }

    public function index()
    {
        return response()->json(Shelf::all());
    }
}
