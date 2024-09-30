<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Order::all());
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->validated());
        return response()->json(new OrderResource($order), 201);
    }

    public function show($id)
    {
        return new OrderResource(Order::findOrFail($id));
    }

    public function update(StoreOrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->validated());
        return response()->json(new OrderResource($order), 200);
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json(null, 204);
    }
}
