<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product', 'user')->get();
        return response()->json(['data' => $orders], 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $order = Order::create([
            'user_id' => $request->user()->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
        ]);

        return response()->json(['data' => $order, 'message' => 'Order placed successfully'], 201);
    }
}