<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    public static function removeProfilePicture(Request $request){
        $image = User::where('id',Auth::user()->id)->get()[0]->profileImage;
        $server = $_SERVER['DOCUMENT_ROOT']; #1416005788233912.jpeg

       #return unlink('/media/satyam/0B0AA5FD58D2CB25/friendsfeed/public/storage/users/'.Auth::user()->id.'/profile/images/'.$image); // correct
        #return unlink('/media/satyam/0B0AA5FD58D2CB25/friendsfeed/public/storage/users/'.Auth::user()->id.'/profile/images/1416005788233912.jpeg'); // correct
        return unlink($server.'/storage/users/'.Auth::user()->id.'/profile/images/'.$image); // correct
    }

    public static function two(Request $request){
        return $_SERVER['DOCUMENT_ROOT'];
    }
}
