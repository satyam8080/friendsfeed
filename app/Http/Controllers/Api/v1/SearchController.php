<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public static function search(Request $request){
        $rules = [
            'item' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(["status" => 404 ,"message" => $validator->errors() ], 404);
        } else{
            if (substr($request->item, 0,1) == '@'){
                $item = substr($request->item, 1);
                $user = User::where(strtolower('username'), 'LIKE', '%'.strtolower($item).'%')->paginate(5);

                if (count($user) == 0){
                    return response()->json(["status" => 404,"message" => "No result found" ], 404);
                }
                return response()->json(["status" => 200,"message" => UserResource::collection($user), "links" => $user ], 200);
            } elseif (substr($request->item, 0,1) == '#'){
                return "# Tag found";
                # This should be implemented

            } elseif ( filter_var($request->item, FILTER_VALIDATE_EMAIL) ){
                $user = User::where(strtolower('email'), 'LIKE', '%'.strtolower($request->item).'%')->paginate(5);
                if (count($user) == 0){
                    return response()->json(["status" => 404,"message" => "No result found" ], 404);
                }
                return response()->json(["status" => 200,"message" => UserResource::collection($user), "links" => $user ], 200);
            } else{
                $user = User::where(strtolower('name') , 'LIKE', '%'.strtolower($request->item).'%')->paginate(5);
                if (count($user) == 0){
                    return response()->json(["status" => 404,"message" => "No result found" ], 404);
                }
                return response()->json(["status" => 200,"message" => UserResource::collection($user), "links" => $user ], 200);
            }
        }
    }
}
