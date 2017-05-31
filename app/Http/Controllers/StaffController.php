<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Role;
use App\Http\Requests\AdminRequest;

class StaffController extends Controller
{
    function __construct(Admin $admin, Role $role)
    {
        $this->admin    = $admin;
        $this->role  = $role;

        $this->middleware('auth:admin');
    }

    public function getListStaff()
    {
        $data      = $this->admin->getListStaff();
        $liststaff = "";
        $status = "";
        $modal = "";
        foreach ($data as $key => $item) {
            $role      = Admin::find($item['id'])->role->name;

            switch ($item['status']) {
                case 1:
                    $status = "<span class='label label-success'>Active</span>";
                    break;
                case 2:
                    $status = "<span class='label label-important'>Banned</span>";
                    break;
                case 3:
                    $status = "<span class='label label-warning'>Pending</span>";
                    break;
                default:
                    $status = "<span class='label'>Inactive</span>";
                    break;
            }

            $liststaff = $liststaff.'
            <tr>
            <td>'.$item['name'].'</td>
            <td>'.$item['email'].'</td>
            <td>'.$role.'</td>
            <td>'.$status.'</td>
            <td class="center">
                    <a class="btn btn-success" href="#">
                        <i class="fa fa-search-plus"></i>  
                    </a>
                    <a class="btn btn-info" href="edit/'.$item['id'].'">
                        <i class="fa fa-edit"></i>  
                    </a>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#delete'.$item['id'].'">
                        <i class="fa fa-trash-o"></i> 
                    </a>
                </td>
            </tr>';
            $modal = $modal.'          
            <!-- Modal -->
            <div class="modal fade" id="delete'.$item['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete Item</h4>
                  </div>
                  <div class="modal-body">
                    Delete this data. Are you sure?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                    <a href="delete/'.$item['id'].'"><button type="button" class="btn btn-primary">Yes</button></a>
                  </div>
                </div>
              </div>
            </div>';
        }
        return view('backend/staff/list',compact('liststaff','modal'));
    }



    public function getAddStaff(){
        $role     = $this->role->getListRole();
        $listrole = "";
        foreach ($role as $key => $item) {
            $listrole = $listrole.'<option value="'.$item['id'].'">'.$item['name'].'</option>';
        }
        return view('backend/staff/add',compact('listrole'));
    }

    public function postAddStaff(AdminRequest $request){

        $admin           = $this->admin;
        $admin->name     = $request->name;
        $admin->email    = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->phone    = $request->phone;
        $admin->address  = $request->address;
        $admin->status   = $request->status;
        $admin->role_id  = $request->role;
        
        $admin->save();

        return redirect()->route('admin.staff.getAdd')->with(['flash_message' => 'Add new staff success']);
    }


    public function getEditStaff($id){

        $admin  = $this->admin->getStaffByID($id);
        $option ="";
        $role   = $this->role->getListRole();
        foreach ($role as $value) {
            if ($value['id'] == $admin['id_role']) {
                $option = $option.'<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
            }
            else{
                $option = $option.'<option value="'.$value['id'].'">'.$value['name'].'</option>';
            }
        }

        if($admin['status'] == 1)
        {
            $status = '
                <option value="1" selected >----Active----</option>
                <option value="2" >----Banned----</option>
                <option value="3" >----Pending----</option>
                <option value="4" >----Inactive----</option>
            ';
        }
        else if($admin['status'] == 2)
        {
           $status = '
                <option value="1"  >----Active----</option>
                <option value="2" selected >----Banned----</option>
                <option value="3" >----Pending----</option>
                <option value="4" >----Inactive----</option>
            ';
        }
        else if($admin['status'] == 3){
            $status = '
                <option value="1"  >----Active----</option>
                <option value="2"  >----Banned----</option>
                <option value="3" selected >----Pending----</option>
                <option value="4" >----Inactive----</option>
            ';
        }
        else{
            $status = '
                <option value="1"  >----Active----</option>
                <option value="2"  >----Banned----</option>
                <option value="3"  >----Pending----</option>
                <option value="4" selected >----Inactive----</option>
            ';
        }



        return view('backend/staff/edit',compact('admin','option','status'));
    }

    public function postEditStaff(Request $request, $id){
        $admin           = $this->admin->getStaffByID($id);
        $admin->name     = $request->name;
        $admin->email    = $request->email;
        $admin->phone    = $request->phone;
        $admin->address  = $request->address;
        $admin->status   = $request->status;
        $admin->role_id  = $request->role;
        $admin->save();

        return redirect()->route('admin.staff.getAdd')->with(['flash_message' => 'Update staff success']);
    }

    public function getDeleteStaff($id)  
    {
        $admin = $this->admin->getStaffByID($id);
        $admin->delete($id);
        return redirect()->route('admin.staff.getList')->with(['flash_message' =>'Delete staff success']);  
    }

}
