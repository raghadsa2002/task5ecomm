<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->get();
        return response()->json(['data' => $products], 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $product = Product::create($input);
        $product->categories()->sync($request->category_ids);
        
        return response()->json(['data' => $product, 'message' => 'Product created successfully'], 201);
    }

    public function show($id)
    {
        $product = Product::with('categories')->find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json(['data' => $product], 200);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        
        $product->update($request->all());
        $product->categories()->sync($request->category_ids);
        
        return response()->json(['data' => $product, 'message' => 'Product updated successfully'], 200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}