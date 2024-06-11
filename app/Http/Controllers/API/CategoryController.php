<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        // Fetch all categories
        return Category::all();
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        // Create a new category
        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    public function show($id)
    {
        // Find a category by ID
        $category = Category::findOrFail($id);

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'sometimes|required|string|max:50',
        ]);

        // Find the category and update it
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return response()->json($category);
    }

    public function destroy($id)
    {
        // Find the category and delete it
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }
}
