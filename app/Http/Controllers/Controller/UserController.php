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

    
    public function search(Request $request)
{
    if ($request->ajax()) {
        $output='';
        $query = $request->get('search');
        if ($query != '') {
              $data = DB::table('users')->where('name','LIKE','%'.$query.'%' )->get();
        } else {
            $data = 'error';
        }
        $total_row = $data->count();

        if ($total_row > 0) {
            foreach ($data as $row ) {
                $output.='<li data-value="'.$row->name.'"  ><img src="'.$row->profileImage.'" alt="" class="img-fluid rounded-circle given" style="height : 26px; width:26px;margin-right:1rem;">'.$row->name.'</li>';

            }
        } else {
            $output = '<li>No Result Found</li>';
        }

        $data = array(
            'table_data' => $output,
            'total_data' => $total_row
        );
       echo $output;
        // echo json_encode($output);
    }
}

    public function searchadv($item)
    {
        $search = DB::table('users')->where('name','LIKE','%'.$item.'%')->get();
        $total_row = $search->count();
        if ($total_row > 0) {
            return view('pages/search')->withData($search);
        } else {
            $search = "false";
            return view('pages/search')->withData($search);
        }
    }

    public function self_post()
    {
        $user_id = $this->getUserId();
        $post = DB::select('select * from post where user_id = :user_id',['user_id'=> $user_id] );
        $total_row = 

        return view('pages/profile')->withData($post);
        //return view('pages/profile',['data'=>$post]);

            }




    
}


