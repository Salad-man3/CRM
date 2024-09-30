<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Resources\ItemResource;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return ItemResource::collection(Item::all());
    }

    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->validated());
        return response()->json(new ItemResource($item), 201);
    }

    public function show($id)
    {
        return new ItemResource(Item::findOrFail($id));
    }

    public function update(StoreItemRequest $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->validated());
        return response()->json(new ItemResource($item), 200);
    }

    public function destroy($id)
    {
        Item::destroy($id);
        return response()->json(null, 204);
    }
}
