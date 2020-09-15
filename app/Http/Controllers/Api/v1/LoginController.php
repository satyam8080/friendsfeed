<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request){
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        $user = User::where('email', $request->email)->get();

        if (count($user) == 0){
            return response()->json(["status" => 404, "message" => "Invalid Credentials"], 404);
        } else{
            if ($user[0]->active == 0){
                $otp = VerifyOtpController::sendOtp($request->email);
                $message = "Please verify your OTP send to your Email: ".$request->email;
                $data = [
                    'user_id' => $user[0]->id ,
                    'email' => $request->email,
                    'active' => 0 ,
                    'msg' => $message
                ];

                return response()->json(["status" => 423, "message" => [$data] ], 423);
            }
        }

        if (!Auth::attempt( $login )) {
            return response()->json(["status" => 404, "message" => "Invalid Credentials"], 404);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        $users = User::where('id',Auth::user()->id)->get();
        $response = [
            'active' => 1 ,
            'token_type' => 'Bearer',
            'access_token' => $accessToken,
            'user' => UserResource::collection($users)
        ];

        return response()->json(["status" => 200, "message" => [$response] ], 200);
    }

    public static function resetPasswordRequest(Request $request){
        $rules = [
            'email' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json(["status" => 404,"message" => $validator->errors()], 404);
        } else {
            if (User::where('email', $request->email)->count() == 0){
                return response()->json(["status" => 404, "message" => "Invalid email"], 404);
            }

            VerifyOtpController::resetPasswordOtp($request->email);

            $message = "Please verify your OTP send to your Email: ".$request->email;
            $data = [
                'email' => $request->email,
                'msg' => $message
            ];
            return response()->json(["status" => 200, "message" => [$data]], 200);
        }
    }

    public static function resetPassword(Request $request){
        $rules = [
            'email' => 'required',
            'otp' => 'required',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json(["status" => 404,"message" => $validator->errors()], 404);
        } else{
            $user = User::where('email', $request->email)->get();
            if (count($user) == 0){
                return response()->json(["status" => 404, "message" => "Invalid email"], 404);
            }

            if ($user[0]->otp == $request->otp){
                User::where('email', $request->email)->update([
                    'password' => Hash::make($request->password)
                ]);

                $details = [
                    'title' => 'Security Alert',
                    'name' => $user[0]->name,
                    'email' => $user[0]->email
                ];

                \Mail::to($request->email)->send(new \App\Mail\ResetPasswordSuccessful($details));
                return response()->json(["status" => 200, "message" => "Password Change Successful"], 200);
            } else{
                return response()->json(["status" => 404, "message" => "Invalid OTP"], 404);
            }
        }
    }
}
