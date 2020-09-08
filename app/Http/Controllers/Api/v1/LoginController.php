<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
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
        $user = User::where('email', $request->email)->get();

        if (count($user) == 0){
            return response()->json(["status" => 404, "message" => "Invalid Credentials"]);
        } else{
            if ($user[0]->active == 0){
                $otp = VerifyOtpController::sendOtp($request->email);
                $message = "Please verify your OTP send to your Email: ".$request->email;
                $data = [
                    'user_id' => $user[0]->id ,
                    'email' => $request->email,
                    'msg' => $message
                ];

                return response()->json(["status" => 401, "message" => [$data] ]);
            }
        }

        if (!Auth::attempt( $login )) {
            return response()->json(["status" => 404, "message" => "Invalid Credentials"]);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        $users = User::where('id',Auth::user()->id)->get();
        $response = [
            'token_type' => 'Bearer',
            'access_token' => $accessToken,
            'user' => UserResource::collection($users)
        ];

        return response()->json(["status" => 200, "message" => $response ]);
    }
}
