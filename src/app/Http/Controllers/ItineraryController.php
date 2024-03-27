<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItineraryRequest;
use App\Models\Itinerary;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ItineraryController extends Controller
{
    public function store(ItineraryRequest $request)
    {
        $data = $request->validated();

        // destinations constraint
        $destinations = json_decode($data['destinations']);
        if(sizeof($destinations) < 2) {
            return response()->json([
                'status' => 'error',
                'message' => 'At least two destination are required',
            ], 400);
        }

        // image upload
        $fileName = time() . '.' . $data['image']->extension();
        $data['image']->storeAs('public/images', $fileName);

        $data = array_merge($data, [
            'image' => $fileName
        ]);

        // insert itinerary using user relationship
        $user = JWTAuth::user();
        $itinerary = $user->itineraries()->create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Itinerary created successfully',
            'user' => $itinerary,
        ], 201);

    }
}
