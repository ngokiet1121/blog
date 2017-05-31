<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Category;
use Auth;
class CategoryController extends Controller
{
    public function __construct(Admin $admin, Category $category)
    {
    	
        $this->category  = $category;
        $this->admin    = $admin;
        $this->middleware('auth:admin');
    }


    public function getListCategory(){
    	$data      = $this->category->getListCategory();
        $listCategory = "";
        $modal = "";
        foreach ($data as $key => $item) {
 			$admin      = Category::find($item['id'])->admin->name;
            $listCategory = $listCategory.'
            <tr>
            <td>'.$item['name'].'</td>
            <td>  <img src="/'.$item['image'].'" alt="'.$item['name'].'"> </td>
            <td>'.$item['content'].'</td>
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
        return view('backend/category/list',compact('listCategory','modal'));
    }


    public function getAddCategory(){
    	return view('backend/category/add');
    }

    public function postAddCategory(Request $request){
    	$category           = $this->category;
    	$now = time();
        $category->name     = $request->name;
        // them anh
        $file_name = ($request->file('fuImage')->getClientOriginalName());
		$name = "$now$file_name";
		$request->file('fuImage')->move("uploads/images/",$name);
		$category->image = "uploads/images/$name"; 
        $category->content    = $request->content;

        $category->slug 	= str_slug($request->name);
        $category->parent   = 0;
        $category->id_admin = Auth::guard('admin')->id();
        $category->save();
        return redirect()->route('admin.category.getList')->with(['flash_message' => 'Add new Category success']);
    }


    public function getEditCategory($id){
    	$category  = $this->category->getCategoryByID($id);

    	return view('backend/category/edit',compact('category'));
    }
    public function postEditCategory(Request $request, $id){
    	$category           = $this->category->getCategoryByID($id);
    	$now = time();

        $category->name     = $request->name;
       
        if ($request->hasFile('fuImage')){
			$file_name = ($request->file('fuImage')->getClientOriginalName());
			$name = "$now$file_name";
			$request->file('fuImage')->move("uploads/images/",$name);
			$category->image = "uploads/images/$name";
		}
        $category->content    = $request->content;
        $category->slug 	= str_slug($request->name);
        $category->parent   = 0;
        $category->id_admin = Auth::guard('admin')->id();
        $category->save();
        return redirect()->route('admin.category.getList')->with(['flash_message' => 'Edit Category success']);
    }


    public function getDeleteCategory($id){
    	$category = $this->category->getCategoryByID($id);
        $category->delete($id);
        return redirect()->route('admin.category.getList')->with(['flash_message' =>'Delete staff success']); 
    }

}
