<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
 * @OA\Post(
 *     path="/api/login",
 *     summary="User Login",
 *     description="Authenticate a user and generate an access token.",
 *     operationId="login",
 *     tags={"Authentication"},
 *     @OA\RequestBody(
 *         required=true,
 *         description="User login credentials",
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(property="email", type="string", example="user@example.com"),
 *             @OA\Property(property="password", type="string", example="password"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Login successful",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Login successful"),
 *             @OA\Property(property="user", type="object",
 *                 @OA\Property(property="token", type="string", example="access_token_here"),
 *                 @OA\Property(property="name", type="string", example="User Name"),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Login failed",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Login failed"),
 *         )
 *     )
 * )
 */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['name'] =  $user->name;
   
            return response()->json([
                'message' => 'Login successful',
                'user' => $success
            ], 200);
        } 
        else{ 
            return response()->json([
                'message' => 'Login failed',
            ], 401);
        } 
    }
}
