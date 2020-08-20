<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoginResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt( $login )) {
            return response()->json(["status" => 404, "message" => "Invalid Credentials"]);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        $users = User::where('id',Auth::user()->id)->get();
        $response = [
            'token_type' => 'Bearer',
            'access_token' => $accessToken,
            'user' => LoginResource::collection($users)
        ];

        return response()->json(["status" => 200, "message" => $response ]);
    }
}
