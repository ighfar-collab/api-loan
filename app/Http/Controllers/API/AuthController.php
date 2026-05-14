<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
 * @OA\Post(
 *     path="/api/login",
 *     summary="User Login",
 *     tags={"Authentication"},
 *
 *     @OA\RequestBody(
 *         required=true,
 *
 *         @OA\JsonContent(
 *             required={"email","password"},
 *
 *             @OA\Property(property="email", type="string", example="test@mail.com"),
 *             @OA\Property(property="password", type="string", example="password")
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Login success"
 *     )
 * )
 */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
    
    /**
 * @OA\Post(
 *     path="/api/register",
 *     summary="User Register",
 *     tags={"Authentication"},
 *
 *     @OA\RequestBody(
 *         required=true,
 *
 *         @OA\JsonContent(
 *             required={"name","email","password"},
 *
 *             @OA\Property(property="name", type="string", example="Ighfar"),
 *             @OA\Property(property="email", type="string", example="ighfar@mail.com"),
 *             @OA\Property(property="password", type="string", example="password")
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=201,
 *         description="Register success"
 *     )
 * )
 */

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout success'
        ]);
    }
}