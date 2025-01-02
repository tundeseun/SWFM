<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
<<<<<<< HEAD
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Shelf::all());
        //

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

        $request->validate([

=======
    public function store(Request $request)
    {
        $request->validate([
>>>>>>> tundeseun/devtest
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

<<<<<<< HEAD
        $shelf = Shelf::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Shelf created successfully', 'shelf' => $shelf]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
=======
        $shelf = Shelf::create($request->all());

        return response()->json($shelf, 201);
    }

    public function index()
    {
        return response()->json(Shelf::all());
>>>>>>> tundeseun/devtest
    }
}
