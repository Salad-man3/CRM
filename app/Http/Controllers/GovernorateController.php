<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use App\Http\Requests\StoreGovernorateRequest;
use App\Http\Resources\GovernorateResource;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    public function index()
    {
        return GovernorateResource::collection(Governorate::all());
    }

    public function store(StoreGovernorateRequest $request)
    {
        $governorate = Governorate::create($request->validated());
        return response()->json(new GovernorateResource($governorate), 201);
    }

    public function show($id)
    {
        return new GovernorateResource(Governorate::findOrFail($id));
    }

    public function update(StoreGovernorateRequest $request, $id)
    {
        $governorate = Governorate::findOrFail($id);
        $governorate->update($request->validated());
        return response()->json(new GovernorateResource($governorate), 200);
    }

    public function destroy($id)
    {
        Governorate::destroy($id);
        return response()->json(null, 204);
    }
}
