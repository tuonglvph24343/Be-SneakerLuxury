<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
 // Display a listing of the products.
 public function index()
 {
    $products = Product::with(['brand', 'category'])->get();
    return response()->json($products);
 }

 // Store a newly created product in storage.
 public function store(Request $request)
 {
     $validator = Validator::make($request->all(), [
         'brand_id' => 'required|integer',
         'category_id' => 'required|integer',
         'name' => 'required|string|max:255',
         'slug' => 'required|string|max:255|unique:products',
         'price' => 'required|numeric',
         'description' => 'nullable|string',
         'status' => 'required|string|in:active,inactive',
     ]);

     if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 422);
     }

     $product = Product::create($request->all());
     return response()->json($product, 201);
 }

 // Display the specified product.
 public function show($id)
 {
     $product = Product::with(['brand', 'category'])->find($id);
     if (!$product) {
         return response()->json(['message' => 'Product not found'], 404);
     }
     return response()->json($product);
 }

 // Update the specified product in storage.
 public function update(Request $request, $id)
 {
     $validator = Validator::make($request->all(), [
         'brand_id' => 'integer',
         'category_id' => 'integer',
         'name' => 'string|max:255',
         'slug' => 'string|max:255|unique:products,slug,' . $id,
         'price' => 'numeric',
         'description' => 'nullable|string',
         'status' => 'string|in:active,inactive',
     ]);

     if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 422);
     }

     $product = Product::find($id);
     if (!$product) {
         return response()->json(['message' => 'Product not found'], 404);
     }

     $product->update($request->all());
     return response()->json($product);
 }

 // Remove the specified product from storage.
 public function destroy($id)
 {
     $product = Product::find($id);
     if (!$product) {
         return response()->json(['message' => 'Product not found'], 404);
     }

     $product->delete();
     return response()->json(['message' => 'Product deleted successfully']);
 }
}
