<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @OA\Get(
     ** path="/api/me",
     *   tags={"Profile"},
     *   summary="Get user data",
     *   operationId="userDetails",
     *
     *   @OA\Response(
     *      response=200,
     *       description="User fetched successfully",
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
     *  security={{ "apiAuth": {} }}
     *)
     **/
    public function me()
    {
        $user = $this->user->find(auth()->id());

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'User fetched successfully!',
            ],
            'data' => [
                'user' => $user,
            ],
        ]);
    }
}
