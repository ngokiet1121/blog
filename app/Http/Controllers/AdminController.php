<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Role;
use Hash;
class AdminController extends Controller
{


	function __construct(Admin $admin, Role $role)
	{
		$this->admin = $admin;
		$this->role  = $role;

	}
	
   	public function getLogin()
    {
        return view('backend/login');
    }

    public function postLogin(Request $request){
    	$data = Admin::select('id','name','email','password','phone','address','status','role_id')->get()->toArray();

        foreach ($data as $admin =>$item) {
            if($request->password==$item['password'] && $request->email == $item['email']){

            return redirect()->route('admin.dashboard');
            }else{
                echo 'ádasdasd';
            }
        }
    }

    public function getDashboard()
    {
        return view('backend/index');
    }
}
