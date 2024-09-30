<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Http\Requests\StoreCartItemRequest;
use App\Http\Resources\CartItemResource;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index()
    {
        return CartItemResource::collection(CartItem::all());
    }

    public function store(StoreCartItemRequest $request)
    {
        $cartItem = CartItem::create($request->validated());
        return response()->json(new CartItemResource($cartItem), 201);
    }

    public function show($id)
    {
        return new CartItemResource(CartItem::findOrFail($id));
    }

    public function update(StoreCartItemRequest $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->update($request->validated());
        return response()->json(new CartItemResource($cartItem), 200);
    }

    public function destroy($id)
    {
        CartItem::destroy($id);
        return response()->json(null, 204);
    }
}
