<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function _construct() {
        $this->middleware ('auth: api', ['except' => ['login', 'register']]);
        }

        public function register(Request $request)
        {
            // Validate the incoming request
            $validatedData = $request->validate([
                'name' => 'required|string|min:2|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|max:255',
            ]);

            // Create the user
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            // Generate token manually
            $token = JWTAuth::fromUser($user);

            // Return the response
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'User created successfully!',
                ],
                'data' => [
                    'user' => $user,
                    'access_token' => [
                        'token' => $token,
                        'type' => 'Bearer',
                        'expires_in' => auth('api')->factory()->getTTL() * 60, // Get token expires in seconds
                    ],
                ],
            ]);
        }

        public function login(Request $request)
        {
            $this->validate($request, [
                'email' => 'required|string',
                'password' => 'required|string',
            ]);

            // attempt a login (validate the credentials provided)
            $token = auth()->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // if token successfully generated then display success response
            // if attempt failed then "unauthenticated" will be returned automatically
            if ($token)
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'status' => 'success',
                        'message' => 'Query fetched successfully.',
                    ],
                    'data' => [
                        'user' => auth()->user(),
                        'access_token' => [
                            'token' => $token,
                            'type' => 'Bearer',
                            'expires_in' => auth()->factory()->getTTL() * 60,
                        ],
                    ],
                ]);
            }
        }



   /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


}
