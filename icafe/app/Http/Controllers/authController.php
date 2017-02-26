<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class authController extends Controller
{
    public function loginVerify(Request $request){
    	$this->validate($request, [
    			'id'=> 'required',
    			'password'=> 'required'
    		]);

    	if(Auth::attempt(['id'=> $request['id'], 'password'=> $request['password']])){
    		if(Auth::user()->role->name === 'cas5'){
                return redirect()->intended('staff-panel');
            }else if(Auth::user()->role->name === 'admin'){
                return redirect()->intended('admin-panel');
            }else if(Auth::user()->role->name === 'cas7'){
                return redirect()->intended('staff-panel');
            }else{
                return redirect()->intended('staff-panel');
            }
    	}else{
    		$error = array('id'=> 'Invalid Username or Password!!');
    		return redirect()->back()->withErrors($error);
    	}

    }

    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }
}
