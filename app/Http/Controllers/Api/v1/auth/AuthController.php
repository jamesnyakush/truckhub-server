<?php

namespace App\Http\Controllers\Api\v1\auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\user\UserResource;
use Illuminate\Support\Facades\Auth;
use Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);


        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "User was not created",
            ], Response::HTTP_OK);
        } else {

            $user->save();

            $savedUser = User::where('email', $request->email)->first();

            return response()->json([
                "status" => true,
                'message' => 'Successfully created user',
                "user" => $savedUser,
            ], Response::HTTP_CREATED);
        }



        //create a default user profile
        /*if ($user) {

            $profile = new UserProfile();
            $profile->user_id = $user->id;
            $profile->profile_image = $base_url . "public/storage/profile_image/default_profile.png";
            $profile->profile_image_path = "public/storage/profile_image/default_profile.png";
            $profile->bio = "Hey! this is my default bio. It's a great.";
            $profile->save();
        }*/
    }


    public function  login(Request $request)
    {

        $validateData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $login_detail = request(['email', 'password']);

        if (!Auth::attempt($login_detail)) {

            return response()->json([
                'error' => 'Login Failed. Please check your login details'
            ], 401);
        }

        $user = $request->user();

        $tokenResult = $user->createToken('AccessToken');
        $token = $tokenResult->token;
        $token->save();


        return response()->json([
            'user' => UserResource::collection(User::with('role')->get()),
            'access_token' => "Bearer " . $token->accessToken,
            'token_id'  => $token->id,

        ], 200);
    }
}
