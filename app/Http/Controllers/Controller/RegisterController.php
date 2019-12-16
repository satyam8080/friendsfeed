<?php

namespace App\Http\Controllers\Controller; 

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    //
    public function store()
    {
    	$this->validate(request(),[
    		'name' => 'required',
    		'email' => 'required',
    		'password' => 'required'
    	]);	

    	$user = User::create(request(['name','email','password']));
    	auth()->login($user);

    	//return redirect()->to('/home');
    	return view('pages.home');
    }

   

    
}
