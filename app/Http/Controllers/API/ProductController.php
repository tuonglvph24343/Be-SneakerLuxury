<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products
        return Product::all();
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:50',
            'amount' => 'required|integer',
            'price' => 'required|integer',
            'thumbail' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Create a new product
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }
    public function show($id)
    {
        // Find a product by ID
        $product = Product::findOrFail($id);

        return response()->json($product);
    }
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'sometimes|required|string|max:50',
            'amount' => 'sometimes|required|integer',
            'price' => 'sometimes|required|integer',
            'thumbail' => 'sometimes|required|string|max:255',
            'brand_id' => 'sometimes|required|exists:brands,id',
            'category_id' => 'sometimes|required|exists:categories,id',
        ]);

        // Find the product and update it
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product);
    }
    public function destroy($id)
    {
        // Find the product and delete it
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }
}
