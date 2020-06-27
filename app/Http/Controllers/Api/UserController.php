<?php

namespace App\Http\Controllers\Api; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {	
    	$rules = [
    		'name' 		=>  'required|min:3|max:64',
    		'email'  	=>  'required|max:128|min:3',
    		'password'  =>  'required',
    		'date'		=>  'required|max:2|min:2',
    		'month'		=>	'required|max:2|min:2',
    		'year'		=>	'required|max:4|min:4',
    		'gender'	=>	'required|max:1|min:1',
    	];

    	$validator = Validator::make($request->all(),$rules);
    	#return response()->json(["status" => 200,"message" => "Registration successful"],200);
    	if($validator->fails()){
    	return response()->json(["status" => 400,"message" => $validator->errors() ],400);
    } else {
    	$find = User::where('email',$request->email)->count();
    	if($find) {
    		return response()->json(["status" => 400,"message" => "User Already exist"],400);
    	} else {
    		User::create($request->all());
    		return response()->json(["status" => 200,"message" => "Registration successful"],200);
    	}
    	
    }
    }


    public function login(Request $request)
    {
    	$rules = [
    		'email'		=>	'required|max:128|min:3',
    		'password'	=>	'required',
    	];

    	$validator = Validator::make($request->all(),$rules);

    	if ($validator->fails()) {
    		return response()->json(["status" => 400,"message" => $validator->errors()],400);
    	} else {
    		$user = User::where('email',$request->email)->count();
    		if($user) {
    			if(Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {
    				$data = User::where('email',$request->email)->get();
    				return response()->json(["status" => 200,"message" => $data] ,200);
    			} else{
    				return response()->json(["message" => "Password Wrong"],400);
    			}
    		} else {
    			return response()->json(["message" => "Email doesn't exist"],400);
    		}
    		 

    	}
    }
}
