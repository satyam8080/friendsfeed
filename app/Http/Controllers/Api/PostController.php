<?php

namespace App\Http\Controllers\Api; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Post;
use App\Likes;
use DB;
class PostController extends Controller
{
    public function userpost(Request $request)
    {
    	$rules = [
    		'user_id'	=>	'required',
    	];

    	$validator = Validator::make($request->all(),$rules);
        $userid = $request->user_id;
        

    	if ($validator->fails()) {
    		return response()->json(["status" => 400,"message" => $validator->errors() ],400); 
    	} else {
    		$post = Post::where('user_id',$request->user_id)->count();
    		if ($post) {
    			$data = Post::where('user_id',$request->user_id)->get();

                   foreach ($data as $dat) {
                        $pid = $dat['post_id']; 
                        $like_check = DB::select('select * from likes where likeBy = :user_id and likeOn = :post_id',['user_id'=> $userid, 'post_id'=> $pid] );
                          $like_count = count($like_check);
                     if ($like_count) {
                        $liked[] = array(
                            'post_id'  => $pid,
                            'status'   => "True",
                        );
                        } else {
                            $liked[] = array(
                            'post_id'  => $pid,
                            'status'   => "False",
                             );
                    }        
                    }            
                $check = $liked;
    			return response()->json(["status" => 200,"message" => $data,"like" => $check ],200);
    		} else{
    			return response()->json(["status" => 400,"message" => "No Post done by user" ],400);
    		}
    	}
    }

    public function like(Request $request)
    {
    	$rules = [
    		'user_id'	=>	'required',
    		'post_id'	=>	'required',
    	];

    	$validator = Validator::make($request->all(),$rules);

    	if ($validator->fails()) {
    		return response()->json(["status" => 400,"message" => $validator->errors()],400);
    	} else{
    		#$check = Likes::where(['likeBy' ,'=', $request->user_id ],[ 'likeOn' ,'=', $request->post_id ])->count();
    		$userid = $request->user_id;
    		$post_id = $request->post_id;

    		$usercheck = DB::select('select * from users where id = :id',['id'=> $userid]);
    		$usercount = count($usercheck);
    		
    		if ($usercount) {
    			$postcheck = DB::select('select * from post where post_id = :post_id',['post_id'=> $post_id]);	
    			$postcount = count($postcheck);

    			if ($postcount) {
    				
    			
    		
    		$check = DB::select('select * from likes where likeBy = :user_id and likeOn = :post_id',['user_id'=> $userid, 'post_id'=> $post_id] );
        $check = count($check);

    		if ($check) {
    			$dislike = Likes::where('likeOn' , $request->post_id)->delete();
    			if ($dislike) {
    				#$query = Post::where('post_id' , $request->post_id)->update(['likes_count' => 'likes_count' - 1]);
    				 $query = DB::update('update post set likes_count = likes_count-1 where post_id = ?',[$post_id] );
    				if ($query) {
    					#$count = Post::select('likes_count','comments_count')->where('post_id' , $request->post_id);
    					 $count = DB::select('select likes_count,comments_count from post where post_id = :post_id',['post_id'=> $post_id]);
    					return response()->json(["status" => 200,"message" => $count ],200);
    				}
    			}
    		} else{
    			#$like = Likes::create(array('likeBy' => $request->user_id, 'likeOn' => $request->post_id));
    			$like=DB::insert('insert into likes (likeBy, likeOn) values (?, ?)', [$userid, $post_id]);
    			if ($like) {
    				#$query = Post::where('post_id' , $request->post_id)->update(['likes_count' => 'likes_count' + 1]);
    				 $query = DB::update('update post set likes_count = likes_count+1 where post_id = ?',[$post_id] );
    				if ($query) {
    					#$count = Post::select('likes_count','comments_count')->where(['post_id' , $request->post_id]);
    					 $count = DB::select('select likes_count,comments_count from post where post_id = :post_id',['post_id'=> $post_id]);
    					return response()->json(["status" => 200,"message" => $count ],200);
    				}
    			}
    		}
    	} else{
    		return response()->json(["status" => 400,"message" => "No Post found " ],400);
    	}
    	} else{
    		return response()->json(["status" => 400,"message" => "No User found " ],400);
    	}
    	}
    }

    public function likecheck(Request $request)
    {
    	$rules = [
    		'user_id'	=>	'required',
    		'post_id'	=>	'required',
    	];

    	$validator = Validator::make($request->all(),$rules);

    	if ($validator->fails()) {
    			return response()->json(["status" => 400,"message" => $validator->errors()],400);
    		} else{
                $user_id = $request->user_id;
                $post_id = $request->post_id;

    			$check = DB::select('select * from likes where likeBy = :user_id and likeOn = :post_id',['user_id'=>$user_id ,'post_id'=> $post_id]);
    			$count = count($check);
    			if ($count) {
    				return response()->json(["status" => 200,"message" => "True" ],200);
    			} else{
    				return response()->json(["status" => 200,"message" => "False" ],200);
    			}
    		}	

    }

    public function post(Request $request)
    {
        $rules = [
            'user_id'   =>  'required',
            'status'    =>  'required|max:9999|min:1',
            'image'     =>  'nullable',
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json(["status" => 400,"message" => $validator->errors()],400);
        } else{

            $userid = $request->user_id;

        //Handle file upload
        if ($request->hasFile('image')) {
            // Get Image name with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get only file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get only Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //filename to store
            $filenameToStore = $userid.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('image')->storeAs('public/users/images',$filenameToStore);
        } else {
            $filenameToStore = "NULL";
        }

        $photoURL = url('/storage/users/images/'.$filenameToStore);

        // Create post
        $post = new Post;
        $post->post = $request->status;
        $post->post_image = $filenameToStore;
        $post->user_id  = $userid;
        $post->save();

         return response()->json(["status" => 200, "message" => ['URL' => $photoURL]],200);
        }
    }
}
