<?php

namespace App\Http\Controllers\controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Post;
use App\Likes;

class PostController extends Controller
{
	public function getUserId()
	{
		$userid = Auth::user()->id;
		return $userid;
	} 


    public function store(Request $request)
    {
    	//Post validation
    	/*$this->validate($request,[
    		'post' 		 => 'required',
    		'post_image' => 'image|nullable|max:51200' 
    	]); */

    	$userid = $this->getUserId();

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

    	// Create post
    	$post = new Post;
    	$post->post = $request->input('new_post');
    	$post->post_image = $filenameToStore;
    	$post->user_id  = $userid;
    	$post->save();

    	 return redirect('/profile');
    }

    public function likes(Request $request)
    {
        if($request->ajax()) { 
             $post_id = $request->get('post_id');
        $userid = $this->getUserId();
        $like=DB::insert('insert into likes (likeBy, likeOn) values (?, ?)', [$userid, $post_id]);  // Return True on success

        if ($like) {
             $query = DB::update('update post set likes_count = likes_count+1 where post_id = ?',[$post_id] );  // return number of row affected

             if ($query) {
                $count = DB::select('select likes_count,comments_count from post where post_id = :post_id',['post_id'=> $post_id]);
                 return $count;
             } else {
                return "false";
             }
         } else {
            return "false";
         } 
        
    } 
    }

    public function dislike(Request $request)
    {
        if($request->ajax()) { 
        $post_id = $request->get('post_id');
        $userid = $this->getUserId();
        $dislike = DB::delete('delete from likes where likeOn = ?',[$post_id]);
        
        if ($dislike) {
            $query = DB::update('update post set likes_count = likes_count-1 where post_id = ?',[$post_id] );  // return number of row affected

            if ($query) {
                  $count = DB::select('select likes_count,comments_count from post where post_id = :post_id',['post_id'=> $post_id]);
                 return $count;
             } else {
                return "false";
             }
        } else {
            return "false";
         } 
    } 
    }
} 
