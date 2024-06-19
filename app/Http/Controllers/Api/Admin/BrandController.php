<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BrandController extends Controller
{
     // Lấy danh sách tất cả các brand
     public function index(): JsonResponse
     {
         $brands = Brand::all();
         return response()->json($brands);
     }
 
     // Lấy thông tin chi tiết của một brand theo id
     public function show(int $id): JsonResponse
     {
         $brand = Brand::find($id);
         if (!$brand) {
             return response()->json(['message' => 'Brand not found'], 404);
         }
         return response()->json($brand);
     }
 
     // Tạo mới một brand
     public function store(Request $request): JsonResponse
     {
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'slug' => 'required|string|max:255',
             'logo' => 'nullable|string|max:255',
         ]);
 
         $brand = Brand::create($validated);
         return response()->json($brand, 201);
     }
 
     // Cập nhật thông tin của một brand
     public function update(Request $request, int $id): JsonResponse
     {
         $brand = Brand::find($id);
         if (!$brand) {
             return response()->json(['message' => 'Brand not found'], 404);
         }
 
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'slug' => 'required|string|max:255',
             'logo' => 'nullable|string|max:255',
         ]);
 
         $brand->update($validated);
         return response()->json($brand);
     }
 
     // Xóa một brand
     public function destroy(int $id): JsonResponse
     {
         $brand = Brand::find($id);
         if (!$brand) {
             return response()->json(['message' => 'Brand not found'], 404);
         }
 
         $brand->delete();
         return response()->json(['message' => 'Brand deleted successfully']);
     }
}
