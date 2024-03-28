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
    /**
     * @OA\Get(
     ** path="/api/itineraries",
     *   tags={"Itinerary"},
     *   summary="List of itineraries with search and filter",
     *   operationId="itineraries",
     *
     *      @OA\Parameter(
     *          name="search",
     *          in="query",
     *          description="Search",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="category",
     *          in="query",
     *          description="Category filter",
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Parameter(
     *           name="duration",
     *           in="query",
     *           description="Duration filter",
     *           @OA\Schema(type="string")
     *       ),
     *   @OA\Response(
     *      response=200,
     *       description="Itineraries fetched successfully",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Not Found"
     *   )
     *)
     **/
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


    /**
     * @OA\Post(
     ** path="/api/itinerary/add",
     *   tags={"Itinerary"},
     *   summary="Add new itinerary",
     *   operationId="itineraryAdd",
     *
     *      @OA\Parameter(
     *          name="title",
     *          in="query",
     *          description="title",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="category",
     *          in="query",
     *          description="category",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Parameter(
     *           name="duration",
     *           in="query",
     *           description="duration",
     *           required=true,
     *           @OA\Schema(type="string")
     *       ),
     *     @OA\Parameter(
     *            name="image",
     *            in="query",
     *            description="image",
     *            required=true,
     *            @OA\Schema(type="string")
     *        ),
     *     @OA\Parameter(
     *             name="destinations",
     *             in="query",
     *             description="destinations",
     *             required=true,
     *             @OA\Schema(type="string")
     *         ),
     *   @OA\Response(
     *      response=201,
     *       description="Itinerary created successfully",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Not Found"
     *   ),
     * @    OA\Response(
     *           response=403,
     *           description="Forbidden"
     *       ),
     *   @OA\Response(
     *      response="422",
     *      description="Validation errors"
     *   ),
     *  security={{ "apiAuth": {} }}
     *)
     **/
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

    /**
     * @OA\Put(
     ** path="/api/itinerary/{itinerary}/update",
     *   tags={"Itinerary"},
     *   summary="Update itinerary",
     *   operationId="itineraryUpdate",
     *
     *      @OA\Parameter(
     *          name="title",
     *          in="query",
     *          description="title",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="category",
     *          in="query",
     *          description="category",
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Parameter(
     *           name="duration",
     *           in="query",
     *           description="duration",
     *           @OA\Schema(type="string")
     *       ),
     *     @OA\Parameter(
     *            name="image",
     *            in="query",
     *            description="image",
     *            @OA\Schema(type="string")
     *        ),
     *     @OA\Parameter(
     *             name="destinations",
     *             in="query",
     *             description="destinations",
     *             @OA\Schema(type="string")
     *         ),
     *   @OA\Response(
     *      response=200,
     *       description="Itinerary updated successfully",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Not Found"
     *   ),
     * @    OA\Response(
     *           response=403,
     *           description="Forbidden"
     *       ),
     *   @OA\Response(
     *      response="422",
     *      description="Validation errors"
     *   ),
     *  security={{ "apiAuth": {} }}
     *)
     **/
    public function update(ItineraryUpdateRequest $request, Itinerary $itinerary)
    {
        $user = JWTAuth::user();
        if (!$user->can('itineraryOwner', $itinerary)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized to update this itinerary',
            ], 403);
        }

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
        $itinerary = $user->itineraries()->findOrFail($itinerary->id);
        $itinerary->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Itinerary updated successfully',
            'itinerary' => $itinerary,
        ], 201);

    }


    /**
     * @OA\Delete(
     ** path="/api/itinerary/{itinerary}/delete",
     *   tags={"Itinerary"},
     *   summary="Delete itinerary",
     *   operationId="itineraryDelete",
     *
     *   @OA\Response(
     *      response=200,
     *       description="Itinerary deleted successfully"
     *   ),
     * @    OA\Response(
     *           response=403,
     *           description="Unauthorized to delete this itinerary"
     *       ),
     *  security={{ "apiAuth": {} }}
     *)
     **/
    public function destroy(Itinerary $itinerary)
    {
        $user = JWTAuth::user();
        if (!$user->can('itineraryOwner', $itinerary)) {
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
