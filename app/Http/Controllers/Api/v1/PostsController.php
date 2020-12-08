<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsResource;
use App\Models\Followers;
use App\Models\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public static function store(Request $request){
        $rules = [
            'status' => 'required|max:9999|min:1',
            'image1' => 'nullable',
            'image2' => 'nullable',
            'image3' => 'nullable',
            'image4' => 'nullable',
            'image5' => 'nullable',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json(["status" => 404,"message" => $validator->errors()], 404);
        } else{
            $user_id = Auth::user()->id;
            $file_path = "public/users/".$user_id."/posts/images";
            //Handle file upload
            if ($request->hasFile('image1')) {
                // Get Image name with extension
                $filenameWithExt = $request->file('image1')->getClientOriginalName();
                // Get only file name
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                // Get only Extension
                $extension = $request->file('image1')->getClientOriginalExtension();
                //filename to store
                $filenameToStore1 = $user_id.time().rand(0,9999).'.'.$extension;
                // upload image
                $path = $request->file('image1')->storeAs($file_path,$filenameToStore1,'s3');
            } else {
                $filenameToStore1 = null;
            }

            if ($request->hasFile('image2')) {
                $filenameWithExt = $request->file('image2')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension = $request->file('image2')->getClientOriginalExtension();
                $filenameToStore2 = $user_id.time().rand(0,9999).'.'.$extension;
                $path = $request->file('image2')->storeAs($file_path,$filenameToStore2,'s3');
            } else {
                $filenameToStore2 = null;
            }

            if ($request->hasFile('image3')) {
                $filenameWithExt = $request->file('image3')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension = $request->file('image3')->getClientOriginalExtension();
                $filenameToStore3 = $user_id.time().rand(0,9999).'.'.$extension;
                $path = $request->file('image3')->storeAs($file_path,$filenameToStore3, 's3');
            } else {
                $filenameToStore3 = null;
            }

            if ($request->hasFile('image4')) {
                $filenameWithExt = $request->file('image4')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension = $request->file('image4')->getClientOriginalExtension();
                $filenameToStore4 = $user_id.time().rand(0,9999).'.'.$extension;
                $path = $request->file('image4')->storeAs($file_path,$filenameToStore4, 's3');
            } else {
                $filenameToStore4 = null;
            }

            if ($request->hasFile('image5')) {
                $filenameWithExt = $request->file('image5')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension = $request->file('image5')->getClientOriginalExtension();
                $filenameToStore5 = $user_id.time().rand(0,9999).'.'.$extension;
                $path = $request->file('image5')->storeAs($file_path,$filenameToStore5, 's3');
            } else {
                $filenameToStore5 = null;
            }

            $create = Post::create([
                'user_id' => $user_id,
                'post' => $request->status,
                'post_image1' => $filenameToStore1,
                'post_image2' => $filenameToStore2,
                'post_image3' => $filenameToStore3,
                'post_image4' => $filenameToStore4,
                'post_image5' => $filenameToStore5
            ]);
            $create_id = $create->id;
            $post = Post::where('id', $create_id)->get();
            #Artisan::call('storage:link');
            return response()->json(["status" => 200,"message" => PostsResource::collection($post) ], 200);
        }
    }

    public static function get(Request $request){
        $following = Followers::where('follow_by', Auth::user()->id )->get();
        if (count($following) == 0){
            return response()->json(["status" => 404,"message" => "You have not follow any one, please follow someone to start viewing there posts here" ], 404);
        } else{
            foreach ($following as $follow){
                $arr[] = $follow->follow_on;
            }
            $posts = Post::whereIn('user_id',$arr)->orderBy('created_at','DESC')->paginate(5);
            if (count($posts) == 0){
                return response()->json(["status" => 404,"message" => "The peoples you follow have not post any thing, follow some other peoples to start viewing there posts here" ], 404);
            }
            return response()->json(["status" => 200,"message" => PostsResource::collection($posts), "links" => $posts ], 200);
        }
    }

    public static function userDetails($user_id){
        $user = User::where('id',$user_id)->get();
        $data = [
            'id' => $user[0]->id,
            'name' => $user[0]->name,
            'username' => "@".$user[0]->username,
            'profileImage' => !empty($user[0]->profileImage) ? Storage::disk('s3')->url('public/users/'.$user[0]->id.'/profile/images/'.$user[0]->profileImage) : null
        ];
        return $data;
    }
}
