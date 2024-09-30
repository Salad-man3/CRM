<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Resources\CollectionResource;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        return CollectionResource::collection(Collection::all());
    }

    public function store(StoreCollectionRequest $request)
    {
        $collection = Collection::create($request->validated());
        return response()->json(new CollectionResource($collection), 201);
    }

    public function show($id)
    {
        return new CollectionResource(Collection::findOrFail($id));
    }

    public function update(StoreCollectionRequest $request, $id)
    {
        $collection = Collection::findOrFail($id);
        $collection->update($request->validated());
        return response()->json(new CollectionResource($collection), 200);
    }

    public function destroy($id)
    {
        Collection::destroy($id);
        return response()->json(null, 204);
    }
}
