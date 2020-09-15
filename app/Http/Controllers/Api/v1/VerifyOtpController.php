<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VerifyOtpController extends Controller
{
    public static function sendOtp($email){
        $otp = rand(111111,999999);
        User::where('email', $email)->update([
            'otp' => $otp
        ]);

        $details = [
            'title' => 'Account Verification',
            'body' => $otp
        ];

        \Mail::to($email)->send(new \App\Mail\AccountVerification($details));
        return null;
    }
    public static function RegisterVerify(Request $request){
        $rules = [
            'user_id' => 'required',
            'otp' => 'required|min:6|max:6'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(["status" => 404 ,"message" => $validator->errors() ], 404);
        } else{
            $user = User::where('id', $request->user_id)->get();
            if (count($user) == 0){
                return response()->json(["status" => 404,"message" => "User not found"], 404);
            } else{
                if ($user[0]->otp == $request->otp){
                    User::where('id', $request->user_id )->update([
                        'active' => '1'
                    ]);
                    return response()->json(["status" => 200,"message" => "OTP verified successfully"],200);
                } else{
                    return response()->json(["status" => 404,"message" => "Invalid OTP"], 404);
                }
            }
        }
    }

    public static function resetPasswordOtp($email){
            $otp = rand(111111,999999);
            User::where('email', $email)->update([
                'otp' => $otp
            ]);

            $details = [
                'title' => 'Reset Password',
                'body' => $otp
            ];

            \Mail::to($email)->send(new \App\Mail\ResetPassword($details));
            return null;
    }
}
