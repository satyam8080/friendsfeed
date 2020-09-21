<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\PostsResource;
use App\Models\Like;
use App\Models\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public static function index(Request $request){
        return User::find(Auth::user()->id);
  }

  public static function myProfile(Request $request){
        $user = User::where('id', Auth::user()->id)->get();
        return response()->json(["status" => 200,"message" => UserResource::collection($user) ]);
  }

  public static function userProfile(Request $request){
      $rules = [
          'user_id' => 'required'
      ];

      $validator = Validator::make($request->all(),$rules);
      if($validator->fails()){
          return response()->json(["status" => 404 ,"message" => $validator->errors() ], 404);
      } else{
          $user = User::where('id', $request->user_id)->get();
          if (count($user) == 0){
              return response()->json(["status" => 404 ,"message" => "User not found" ], 404);
          }
          return response()->json(["status" => 200,"message" => UserResource::collection($user) ], 200);
      }
    }

  public static function userPosts(Request $request){
      $rules = [
          'user_id' => 'required'
      ];

      $validator = Validator::make($request->all(),$rules);
      if($validator->fails()){
          return response()->json(["status" => 404 ,"message" => $validator->errors() ], 404);
      } else{
          $posts = Post::where('user_id', $request->user_id )->orderBy('created_at','DESC')->Paginate(5);
          if (count($posts)){
              return response()->json(["status" => 200,"message" => PostsResource::collection($posts), "links" => $posts ], 200);
          } else{
              return response()->json(["status" => 404,"message" => "No posts done by user" ], 404);
          }
      }
  }

  public static function myPosts(Request $request){
        $posts = Post::where('user_id', Auth::user()->id )->orderBy('created_at','DESC')->Paginate(5);
        if (count($posts)){
            return response()->json(["status" => 200,"message" => PostsResource::collection($posts), "links" => $posts ], 200);
        } else{
            return response()->json(["status" => 404,"message" => "No posts done by user" ], 404);
        }
    }

  public static function likeCheck($user_id, $post_id){
        $like = Like::where([ ['likeOn' , $post_id], ['likeBy' , $user_id] ])->get();
        if (count($like)){
            return 1;
        }else{
            return 0;
        }
  }

  public static function changeProfilePicture(Request $request){
      $rules = [
          'image' => 'required'
      ];
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          return response()->json(["status" => 404,"message" => $validator->errors()], 404);
      } else{
          $user_id = Auth::user()->id;
          $file_path = "public/users/".$user_id."/profile/images";
          //Handle file upload
          if ($request->hasFile('image')) {
              // Get Image name with extension
              $filenameWithExt = $request->file('image')->getClientOriginalName();
              // Get only file name
              $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
              // Get only Extension
              $extension = $request->file('image')->getClientOriginalExtension();
              //filename to store
              $filenameToStore = $user_id.time().rand(0,9999).'.'.$extension;
              // upload image
              $path = $request->file('image')->storeAs($file_path,$filenameToStore);
          } else {
              $filenameToStore = null;
          }

          User::where('id', Auth::user()->id)->update([
              'profileImage' => $filenameToStore
          ]);
          $user = User::where('id', Auth::user()->id)->get();
          Artisan::call('storage:link');
          return response()->json(["status" => 200,"message" => UserResource::collection($user) ], 200);
      }
  }
}
