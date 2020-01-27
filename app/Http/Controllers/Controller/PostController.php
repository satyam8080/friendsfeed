<?php

namespace App\Http\Controllers\controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Post;

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
    	$this->validate($request,[
    		'post' 		 => 'required',
    		'post_image' => 'image|nullable|max:51200' 
    	]);

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
    	$post->post = $request->input('post');
    	$post->post_image = $filenameToStore;
    	$post->user_id  = $userid;
    	$post->save();

    	return redirect('/profile'); 
    }
}
