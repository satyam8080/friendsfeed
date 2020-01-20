<?php

namespace App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
use Auth;

class UserController extends Controller
{
    protected $username_global;
	
	public function getUserId()
	{
		$userid = Auth::user()->id;
		return $userid;
	}


	 public function getFirstName()
    {
    	 $lastSpace = strpos(Auth::user()->name ," ");

			if($lastSpace == FALSE){
 				$username = Auth::user()->name ;
 				return $username;
									}
			else{
 				$username = substr(Auth::user()->name ,0,$lastSpace);
 				return $username;
				} 
    }


    public function createUserNameDefault()
    {
    	$firstname = $this->getFirstName();
    	$userid = $this->getUserId();
        $username = $firstname.rand(100,1000000);
        $check = $this->checkUserName($username);

    	if ($check) {

            $error = 'false';
            $data['username'] = $username;
            $data['error'] = $error;
            return view('pages/username')->withData($data);
            $this->$username_global = $username;
    	}
    	else {
    		$this->createUserNameDefault();
    		
    	}
    	
    }

    public function getUserName() 
    {  
    		
            $userid = $this->getUserId();
    		$username = DB::table('users')->where('id', $userid)->value('username');
    		$error = 'false';
    		$data['username'] = $username;
    		$data['error'] = $error;

    		if ($username) {
    			return view('pages/username')->withData($data);
    		}
       		
    	else {
    		$error = true;
            $username = '';
            $data['username'] = $username;
            $data['error'] = $error;
    		return view('pages/username')->withData($data);
    	}
    	
    }

     public function getUserNameDefault() 
    {  
    	$createusername = $this->createUserNameDefault();

    	if ($createusername) {
       		return redirect()->route('selectusername');
    						}

    	else {
    		$error = true;
    		return view('pages/username')->with('error',$error);
    	}
    	
    }

    public function acceptUser(Request $request)
    {
    	$userid = $this->getUserId();
        $username = DB::table('users')->where('id', $userid)->value('username');
        $input = $request->input('username');
    	$userid = $this->getUserId();
    	$check = $this->checkUserName($input);

    	if ($check || $input==$username) {
    		DB::table('users')
            ->where('id', $userid)
            ->update(['username' => $input]);

            return redirect()->route('home');
    	}
    	else {
    		$error = 'true';
            $data['username'] = $input;
            $data['error'] = $error;
    
    		return view('pages/username')->withData($data);
    	}
    	

    	
    }
    public function checkUserName($username)
    {
    	$check = DB::select('select username from users where username = :username',['username'=> $username]);
        $check = count($check);

    	if ($check == 0) {
    		return true;
    	}
    	else {
    		return false;
    	}
    }

    
}
