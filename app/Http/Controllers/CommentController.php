<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Comment;
use App\User;
use App\admin;
use Auth;

class CommentController extends Controller
{
    public function __construct(Admin $admin, Category $category, Post $post,User $user,Comment $comment)
    { 
        $this->category  = $category;
        $this->admin    = $admin;
        $this->post = $post;
        $this->user = $user;
        $this->comment = $comment;
    }

     public function getListComment(){
    	$data      = $this->comment->getListComment();
        $listComment = "";
        $modal = "";
        $status = "";
        foreach ($data as $key => $item) {
 			$admin      = Comment::find($item['id'])->admin->name;
 			$post      = Comment::find($item['id'])->post->name;
 			$user      = Comment::find($item['id'])->user->name;
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
            $listComment = $listComment.'
            <tr>
            <td>'.$item['content'].'</td>
            <td>'.$post.'</td>
            <td>'.$user.'</td>
            <td>'.$status.'</td>
            <td class="center">
                    <a class="btn btn-success" href="#">
                        <i class="fa fa-search-plus"></i>  
                    </a>
                    <a class="btn btn-info" href="edit/'.$item['id'].'">
                        <i class="fa fa-edit"></i>  
                    </a>
                    <a class="btn btn-danger" style="display: none" data-toggle="modal" data-target="#delete'.$item['id'].'">
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
        return view('backend/comment/list',compact('listComment','modal'));
    }

    public function getEditComment($id){
    	$comment  = $this->comment->getCommentByID($id);
    	if($comment['status'] == 1)
        {
            $status = '
                <option value="1" selected >----Active----</option>
                <option value="2" >----Banned----</option>
                <option value="3" >----Pending----</option>
                <option value="4" >----Inactive----</option>
            ';
        }
        else if($comment['status'] == 2)
        {
           $status = '
                <option value="1"  >----Active----</option>
                <option value="2" selected >----Banned----</option>
                <option value="3" >----Pending----</option>
                <option value="4" >----Inactive----</option>
            ';
        }
        else if($comment['status'] == 3){
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
    	return view('backend/comment/edit',compact('comment','status'));
    }
    public function postEditComment(Request $request, $id){
    	$comment           = $this->comment->getCommentByID($id);

        $comment->status     = $request->status;
        $comment->admin_id = Auth::guard('admin')->id();
        $comment->save();
        return redirect()->route('admin.comment.getList')->with(['flash_message' => 'Edit Comment success']);
    }


    public function getDeleteComment($id){
    	$comment = $this->comment->getCommentByID($id);
        $comment->delete($id);
        return redirect()->route('admin.comment.getList')->with(['flash_message' =>'Delete Comment success']); 
    }

}




