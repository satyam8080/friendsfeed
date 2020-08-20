<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected static function register(Request $request){
        $rules = [
            'name' => 'required|min:3|max:64',
            'email' => 'required|max:128|min:3',
            'password' => 'required|max:64|min:6',
            'dob' => 'required|max:10|min:10',
            'gender' => 'required|max:1|min:1'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(["status" => 404 ,"message" => $validator->errors() ]);
        } else {
            $find = User::where('email',$request->email)->count();
            if($find) {
                return response()->json(["status" => 404,"message" => "User Already exist"]);
            } else {
                $create = User::create([
                    'name' => $request->name ,
                    'email' => $request->email ,
                    'password' => Hash::make($request->password) ,
                    'dob' => $request->dob ,
                    'gender' => $request->gender
                ]);
                $create_id = $create->id;
                $username = self::createDefaultUsername($create_id, $request->name);
                return response()->json(["status" => 200,"message" => $create ]);
            }
        }
    }


    protected static function createDefaultUsername($created_id, $name)
    {
        $firstname = self::getFirstName($name);
        $username = $firstname.$created_id.time();
        $check = self::checkUserName($username);
        if ($check) {
            User::where('id', $created_id)->update([
                'username' => strtolower($username)
            ]);
            return 1;
        }
        else {
            self::createUserNameDefault($created_id, $name);

        }

    }

    protected static function checkUserName($username)
    {
        $check = User::where('username', $username)->count();
        if ($check) {
            return 0;
        }
        else {
            return 1;
        }
    }

    protected static function getFirstName($name){
        $lastSpace = strpos($name ," ");
        if($lastSpace == FALSE){
            return $name;
        }
        else{
            $username = substr($name ,0,$lastSpace);
            return $username;
        }
    }
}
