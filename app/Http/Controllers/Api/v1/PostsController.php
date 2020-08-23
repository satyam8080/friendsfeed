<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            return response()->json(["status" => 404,"message" => $validator->errors()]);
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
                $path = $request->file('image1')->storeAs($file_path,$filenameToStore1);
            } else {
                $filenameToStore1 = "NULL";
            }

            if ($request->hasFile('image2')) {
                $filenameWithExt = $request->file('image2')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension = $request->file('image2')->getClientOriginalExtension();
                $filenameToStore2 = $user_id.time().rand(0,9999).'.'.$extension;
                $path = $request->file('image2')->storeAs($file_path,$filenameToStore2);
            } else {
                $filenameToStore2 = "NULL";
            }

            if ($request->hasFile('image3')) {
                $filenameWithExt = $request->file('image3')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension = $request->file('image3')->getClientOriginalExtension();
                $filenameToStore3 = $user_id.time().rand(0,9999).'.'.$extension;
                $path = $request->file('image3')->storeAs($file_path,$filenameToStore3);
            } else {
                $filenameToStore3 = "NULL";
            }

            if ($request->hasFile('image4')) {
                $filenameWithExt = $request->file('image4')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension = $request->file('image4')->getClientOriginalExtension();
                $filenameToStore4 = $user_id.time().rand(0,9999).'.'.$extension;
                $path = $request->file('image4')->storeAs($file_path,$filenameToStore4);
            } else {
                $filenameToStore4 = "NULL";
            }

            if ($request->hasFile('image5')) {
                $filenameWithExt = $request->file('image5')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension = $request->file('image5')->getClientOriginalExtension();
                $filenameToStore5 = $user_id.time().rand(0,9999).'.'.$extension;
                $path = $request->file('image5')->storeAs($file_path,$filenameToStore5);
            } else {
                $filenameToStore5 = "NULL";
            }
            #$photoURL = url("/".$file_path."/".$filenameToStore);

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
            return response()->json(["status" => 200,"message" => PostsResource::collection($post) ]);
        }
    }
}
