<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
/**
 * @OA\Post(
 *     path="/api/register",
 *     summary="User Registration",
 *     description="Register a new user in the application.",
 *     operationId="register",
 *     tags={"Authentication"},
 *     @OA\RequestBody(
 *         required=true,
 *         description="User registration data",
 *         @OA\JsonContent(
 *             required={"name", "email", "password", "password_confirmation"},
 *             @OA\Property(property="name", type="string", example="John Doe"),
 *             @OA\Property(property="email", type="string", format="email", example="johndoe@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="password123"),
 *             @OA\Property(property="password_confirmation", type="string", format="password", example="password123"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Registration successful",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Registration successful"),
 *             @OA\Property(property="user", type="object",
 *                 @OA\Property(property="token", type="string", example="access_token_here"),
 *                 @OA\Property(property="name", type="string", example="John Doe"),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Validation Error",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Validation Error."),
 *             @OA\Property(property="error", type="object",
 *                 @OA\Property(property="name", type="array",
 *                     @OA\Items(type="string", example="The name field is required.")
 *                 ),
 *                 @OA\Property(property="email", type="array",
 *                     @OA\Items(type="string", example="The email field is required.")
 *                 ),
 *                 @OA\Property(property="password", type="array",
 *                     @OA\Items(type="string", example="The password field is required.")
 *                 ),
 *             )
 *         )
 *     )
 * )
 */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
  
        if($validator->fails()){
            return response()->json([
                'message' => 'Validation Error.',
                'error' => $validator->errors()
            ], 401);     
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
   
        return response()->json([
            'message' => 'Registration successful',
            'user' => $success
        ], 201);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

}
