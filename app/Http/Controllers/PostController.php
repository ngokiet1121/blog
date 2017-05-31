<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\Category;
use App\Post;


class PostController extends Controller
{
    public function __construct(Admin $admin, Category $category, Post $post)
    {
    	
        $this->category  = $category;
        $this->admin    = $admin;
        $this->post = $post;

        $this->middleware('auth:admin');
    }


    public function getListPost(){
    	$data      = $this->post->getListPost();
        $list = "";
        $modal = "";
        foreach ($data as $key => $item) {
 			$admin      = Post::find($item['id'])->admin->name;
 			$category      = Post::find($item['id'])->category->name;
            $list = $list.'
            <tr>
            <td>'.$item['name'].'</td>
            <td>'.$item['view'].'</td>
            <td>'.$category.'</td>
            <td>'.$admin.'</td>
            <td class="center">
                    <a class="btn btn-success" href="view/'.$item['id'].'">
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
        return view('backend/post/list',compact('list','modal'));
    }


    public function getAddPost(){
    	$category     = $this->category->getListCategory();
        $listcategory = "";
        foreach ($category as $key => $item) {
            $listcategory = $listcategory.'<option value="'.$item['id'].'">'.$item['name'].'</option>';
        }

    	return view('backend/post/add',compact('listcategory'));

    }

    public function postAddPost(Request $request){
    	
    	$post           = $this->post;
        $post->name     = $request->name;
        // them anh
        $post->slug 	= str_slug($request->name);
        $post->description    = $request->description;

        
        $post->view     = 0;
        
        $post->admin_id = Auth::guard('admin')->id();
        $post->category_id     = $request->category;
        $post->save();
        return redirect()->route('admin.post.getList')->with(['flash_message' => 'Add new Post success']);
    }


    public function getEditPost($id){
    	$post  = $this->post->getPostByID($id);
        $category  = $this->category->getListCategory();
        $option ="";
        foreach ($category as $value) {
            if ($value['id'] == $post['category_id']) {
                $option = $option.'<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
            }
            else{
                $option = $option.'<option value="'.$value['id'].'">'.$value['name'].'</option>';
            }
        }

    	return view('backend/post/edit',compact('option','post'));
    }
    public function postEditPost(Request $request, $id){
    	$post  = $this->post->getPostByID($id);

        $post->name     = $request->name;
        // them anh
        $post->slug 	= str_slug($request->name);
        $post->description    = $request->description;

        
        $post->view     = 0;
        
        $post->admin_id = Auth::guard('admin')->id();
        $post->category_id     = $request->category;
        $post->save();
        return redirect()->route('admin.post.getList')->with(['flash_message' => 'Edit Post success']);
    }
    public function getDeletePost($id){
    	$post = $this->post->getpostByID($id);
        $post->delete($id);
        return redirect()->route('admin.post.getList')->with(['flash_message' =>'Delete staff success']); 
    }


    public function getViewPost($id){
    	$post  = $this->post->getPostByID($id);
        $category      = Post::find($post['id'])->category->name;
        
    	return view('backend/post/view',compact('category','post'));
    }
}
