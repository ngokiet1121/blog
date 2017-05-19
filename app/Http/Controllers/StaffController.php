<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Role;
class StaffController extends Controller
{

    /*function __construct(Admin $admin, Role $role)
    {
        $this->admin    = $admin;
        $this->role  = $role;

    }*/


    public function getListStaff()
    {
       $data = Admin::select('id','name','email','password','phone','address','status','role_id')->orderBy('id','ASC')->get()->toArray();
        $liststaff = "";
        foreach ($data as $key => $item) {
            $role      = Admin::find($item['id'])->role->role;
            $liststaff = $liststaff.'
            <tr>
            
            <td>'.$item['name'].'</td>
            <td>'.$item['email'].'</td>
            <td>'.$item['role_id'].'</td>
            <td>'.$item['status'].'</td>
            <td class="center">
                    <a class="btn btn-success" href="#">
                        <i class="fa fa-search-plus"></i>  
                    </a>
                    <a class="btn btn-info" href="#">
                        <i class="fa fa-edit"></i>  
                    </a>
                    <a class="btn btn-danger" href="#">
                        <i class="fa fa-trash-o"></i> 
                    </a>
                </td>
            </tr>';
        }
        return view('backend/staff/list',compact('liststaff','biencucbo'));
    }

    public function getAddStaff(){
    	return view('backend/staff/add');
    }

    public function getEditStaff(){
    	return view('backend/staff/edit');
    }
}
