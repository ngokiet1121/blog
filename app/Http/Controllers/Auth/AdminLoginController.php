<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{

	public function __construct()
    {
        $this->middleware('guest:admin',['except' => 'getLogout']);

    }

    public function showLoginForm(){
    	return view('auth.admin-login');
    }

    public function login(Request $request){
    	
    	//validate the form data
    	$this->validate($request, [
    			'email' =>'required|email',
    			'password' =>'required|min:6'
    		]);
    	//Attemp to log the user in
    	
    	//if succsessful, then redirect to their intended location
    	if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)) {
    		return redirect()->intended(route('admin.dashboard'));
    	}
    	//if unsuccsessful, redirect back
    	return redirect()->back()->withInput($request->only('email','remember'));

    }

    public function getLogout(){
        Auth::guard('admin')->logout();
        return view('auth.admin-login');
    }
}
