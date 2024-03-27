<?php

namespace App\Http\Controllers;
use App\Http\Requests\ItineraryUpdateRequest;
use App\Http\Requests\ItineraryRequest;
use App\Models\Itinerary;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ItineraryController extends Controller
{
    public function index(Request $request)
    {
        $itineraries = Itinerary::latest()

            // search
            ->when(
                $request->search,
                function (Builder $builder) use ($request) {
                    $builder->where('title', 'like', "%{$request->search}%");
                }
            )

            // category filter
            ->when(
                $request->category,
                function (Builder $builder) use ($request) {
                    $builder->where('category',  $request->category);
                }
            )

            // duration filter
            ->when(
                $request->duration,
                function (Builder $builder) use ($request) {
                    $builder->where('duration',  $request->duration);
                }
            )
            ->get();

        return response()->json([
            'status' => 'success',
            'itineraries' => $itineraries,
        ], 200);
    }


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
            'itinerary' => $itinerary,
        ], 201);

    }


    public function update(ItineraryUpdateRequest $request, Itinerary $itinerary)
    {
        $data = $request->validated();

        if(in_array('destinations', $data))
        {
            $destinations = json_decode($data['destinations']);
            if(sizeof($destinations) < 2) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'At least two destination are required',
                ], 400);
            }
        }

        // image upload
        if(in_array('image', $data))
        {
            $fileName = time() . '.' . $data['image']->extension();
            $data['image']->storeAs('public/images', $fileName);
            $data = array_merge($data, [
                'image' => $fileName
            ]);
        }

        // insert itinerary using user relationship
        $user = JWTAuth::user();
        $itinerary = $user->itineraries()->findOrFail($itinerary->id);
        $itinerary->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Itinerary updated successfully',
            'itinerary' => $itinerary,
        ], 201);

    }


    public function destroy(Itinerary $itinerary)
    {
        $user = JWTAuth::user();
        if (!$user->can('delete', $itinerary)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized to delete this itinerary',
            ], 403);
        }

        // delete
        $itinerary->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Itinerary deleted successfully',
        ], 200);
    }


}
