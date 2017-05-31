<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Comment;
use App\User;
use App\admin;
use Auth;

class UserController extends Controller
{
    public function __construct(Admin $admin, Category $category, Post $post,User $user,Comment $comment)
    { 
        $this->category  = $category;
        $this->admin    = $admin;
        $this->post = $post;
        $this->user = $user;
        $this->comment = $comment;
    }

     public function getListUser(){
    	$data      = $this->user->getListUser();
        $listUser = "";
        $modal = "";
        $status = "";
        foreach ($data as $key => $item) {
 			$admin      = User::find($item['id'])->admin->name;
 			
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
            $listUser = $listUser.'
            <tr>
            <td>'.$item['name'].'</td>
            <td>'.$item['email'].'</td>
            <td>'.$status.'</td>
            <td>'.$admin.'</td>
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
        return view('backend/user/list',compact('listUser','modal'));
    }

    public function getEditUser($id){
    	$user  = $this->user->getUserByID($id);
    	if($user['status'] == 1)
        {
            $status = '
                <option value="1" selected >----Active----</option>
                <option value="2" >----Banned----</option>
                <option value="3" >----Pending----</option>
                <option value="4" >----Inactive----</option>
            ';
        }
        else if($user['status'] == 2)
        {
           $status = '
                <option value="1"  >----Active----</option>
                <option value="2" selected >----Banned----</option>
                <option value="3" >----Pending----</option>
                <option value="4" >----Inactive----</option>
            ';
        }
        else if($user['status'] == 3){
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
    	return view('backend/user/edit',compact('user','status'));
    }
    public function postEditUser(Request $request, $id){
    	$user           = $this->user->getUserByID($id);

        $user->status     = $request->status;
        $user->admin_id = Auth::guard('admin')->id();
        $user->save();
        return redirect()->route('admin.user.getList')->with(['flash_message' => 'Edit Comment success']);
    }


    // public function getDeleteComment($id){
    // 	$user = $this->user->getCommentByID($id);
    //     $user->delete($id);
    //     return redirect()->route('admin.user.getList')->with(['flash_message' =>'Delete Comment success']); 
    // }

}




