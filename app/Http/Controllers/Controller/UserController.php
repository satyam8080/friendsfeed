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

    /*public function searchResult($search)
    {
        if (!empty($search)) {
            $search = $search.'%';
            $result = DB::select('select `id`,`username`,`name`,`profileImage` from users where `username` like :search or `name` like :search ',['search'=> $search]);
            return $result;
        }
    }*/
    
    /*public function search(Request $request)
    {
        if($request->ajax())
    {
    $output="";
    $products=DB::table('users')->where('username','LIKE','%'.$request->search."%" && 'name','LIKE','%'.$request->search."%")->get();
    if($products)
    {
        foreach ($products as $key => $product) {
        $output.='<tr>'.
        '<td>'.$product->id.'</td>'.
        '<td>'.$product->name.'</td>'.
        '<td>'.$product->username.'</td>'.
        '<td>'.$product->profileImage.'</td>'.
        '</tr>';
    }
    return Response($output);
   }
}
}*/

public function search(Request $request)
{
    if ($request->ajax()) {
        $output='';
        $query = $request->get('query');
        if ($query != '') {
              $data = DB::table('users')->where('username','LIKE','%'.$query.'%')->where('name','LIKE','%'.$query.'%' )->get();
        } else {
            $data = 'error';
        }
        $total_row = $data->count();

        if ($total_row > 0) {
            foreach ($data as $row ) {
                 $output.='<tr>'.
        '<td>'.$row->id.'</td>'.
        '<td>'.$row->name.'</td>'.
        '<td>'.$row->username.'</td>'.
        '<td>'.$row->profileImage.'</td>'.
        '</tr>';
            }
        } else {
            $output = '<tr>'.
            '<td>'.'No result found'.'</td>'.
            '</tr>';
        }

        $data = array(
            'table_data' => $output,
            'total_data' => $total_data
        );
        echo json_encode($data);
    }
}

public function qq(Request $request)
{   /*$query='sa';
                 $data = DB::table('users')->where('username','LIKE','%'.$query.'%')->where('name','LIKE','%'.$query.'%' )->get();
                       // $check = DB::select('select id,name,username,profileImage from users where username =  :username ',['username'=> $username]);
                    
                 dd($data);*/
                 if ($request->ajax()) {
        /*$output='';
        $query = $request->get('query');
        dd($query);
        echo "true";*/
         echo json_encode('hello');
    }
    else {
        echo "false";
    }
}
    

    
}
