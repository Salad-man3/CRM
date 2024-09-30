<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return ProfileResource::collection(Profile::all());
    }

    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:profiles',
            'full_name' => 'required|string|max:255',
            'avatar_url' => 'nullable|url|max:2048', // Change here to accept URL
        ]);

        if ($validator->fails()) {
            Log::warning('Validation failed:', ['errors' => $validator->errors()]);
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        try {
            // Create the profile with avatar_url if it exists
            $profile = Profile::create([
                'username' => $request->input('username'),
                'full_name' => $request->input('full_name'),
                'avatar_url' => $request->input('avatar_url'), // Directly use the URL from the request
                'role' => 'user', // Set default role if needed
            ]);

            return response()->json(['message' => 'Profile created successfully', 'profile' => new ProfileResource($profile)], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating profile', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        return new ProfileResource(Profile::findOrFail($id));
    }

    public function update(Request $request, Profile $profile)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'username' => 'sometimes|required|string|max:255|unique:profiles,username,' . $profile->id,
            'full_name' => 'sometimes|required|string|max:255',
            'avatar_url' => 'nullable|url|max:2048', // Change here to accept URL
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        if ($request->has('username')) {
            $profile->username = $request->input('username');
        }

        if ($request->has('full_name')) {
            $profile->full_name = $request->input('full_name');
        }

        if ($request->has('avatar_url')) { // Change here to use URL
            $profile->avatar_url = $request->input('avatar_url'); // Directly use the URL from the request
        }

        $profile->save();

        return response()->json(['message' => 'Profile updated successfully', 'profile' => new ProfileResource($profile)], 200);
    }

    public function destroy($id)
    {
        Profile::destroy($id);
        return response()->json(null, 204);
    }
}
