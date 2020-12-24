<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\HeaderResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeaderController extends Controller
{
    public static function header(Request $request){
        $user = User::where('id', Auth::user()->id)->get();
        return response()->json(["status" => 200, "message" => HeaderResource::collection($user) ], 200);
    }
}
