<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Post;
use App\Comment;
use App\User;
use App\admin;
use Session;

use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void

     */

    public function __construct(Admin $admin, Category $category, Post $post,User $user,Comment $comment)
    {
        $this->category  = $category;
        $this->admin    = $admin;
        $this->post = $post;
        $this->user = $user;
        $this->comment = $comment;

        // $login = "";

        // if ($user['name'] == null){
        //     $login = $login.'<a  href="http://blogk.com.vn/login"><i class="fa fa-lock"></i> Sign In</a>'; 
        // }
        // else{
        //     $login = $login.'<a href=""><i class="fa fa-user">'.$user['name'].'</i></a>';
        // }

        // view()->share(['login' => $login]);

    }

    public function index()
    {
        $posts = $this->post->getListPostPaginateNew();

        $list = "";
        foreach ($posts as $key => $item) {
            $admin      = Post::find($item['id'])->admin->name;
            $category      = Post::find($item['id'])->category->slug;
            $comments = $this->comment->getListCommentByPost($item['id']);
            $count_comments = count($comments);
            $list = $list.'
            <div class="media">
                <a class="pull-left" href="post/'.$category.'/'.$item['slug'].'">
                    <i class="fa fa-file-text fa-3x"></i>
                </a>
                <div class="media-body">
                    <h5><a>'.$admin.'</a> '.$item['created_at'].' </h5>
                    <h4 class="media-heading"><a href="post/'.$category.'/'.$item['slug'].'">'.$item['name'].'</a></h4><br/>
                    <span class="score" data-toggle="tooltip" data-placement="bottom" title="Views!" ><i class="fa fa-eye">&nbsp;'.$item['view'].'</i></span>
                    <span class="score" data-toggle="tooltip" data-placement="bottom" title="Comments!" ><i class="fa fa-comments">&nbsp;'.$count_comments.'</i></span>
                </div>
            </div>';
        }


        $paginate = "";
          

        if ($posts->currentPage() != 1) {
            $paginate = $paginate.'
                  <li><a href="'.str_replace('/?','?',$posts->url($posts->currentPage() - 1)).'">&laquo;</a></li>
            ';
        }
        for($i = 1;$i <= $posts->lastPage() ; $i++){
            $paginate = $paginate.'
                <li class="active" >
                    <a  href="'.str_replace('/?','?',$posts->url($i)).'">'. $i .'</a>
                </li>
            ';
        }
        if($posts->currentPage() != $posts->lastPage()){
                $paginate = $paginate.'<li><a href="'.str_replace('/?','?',$posts->url($posts->currentPage() + 1)).'">&raquo;</a></li>';
        }


        return view('frontend.index',compact('list','paginate'));
    }

    public function getTopView()
    {
        $posts = $this->post->getListPostPaginateTopView();

        $list = "";
        foreach ($posts as $key => $item) {
            $admin      = Post::find($item['id'])->admin->name;
            $category      = Post::find($item['id'])->category->slug;
            $comments = $this->comment->getListCommentByPost($item['id']);
            $count_comments = count($comments);
            $list = $list.'
            <div class="media">
                <a class="pull-left" href="post/'.$category.'/'.$item['slug'].'">
                    <i class="fa fa-file-text fa-3x"></i>
                </a>
                <div class="media-body">
                    <h5><a>'.$admin.'</a> '.$item['created_at'].' </h5>
                    <h4 class="media-heading"><a href="post/'.$category.'/'.$item['slug'].'">'.$item['name'].'</a></h4><br/>
                    <span class="score" data-toggle="tooltip" data-placement="bottom" title="Views!" ><i class="fa fa-eye">&nbsp; '.$item['view'].'</i></span>
                    <span class="score" data-toggle="tooltip" data-placement="bottom" title="Comments!" ><i class="fa fa-comments">&nbsp; '.$count_comments.'</i></span>
                </div>
            </div>';
        }
        $paginate = "";
          

        if ($posts->currentPage() != 1) {
            $paginate = $paginate.'
                  <li><a href="'.str_replace('/?','?',$posts->url($posts->currentPage() - 1)).'">&laquo;</a></li>
            ';
        }
        for($i = 1;$i <= $posts->lastPage() ; $i++){
            $paginate = $paginate.'
                <li class="active" >
                    <a  href="'.str_replace('/?','?',$posts->url($i)).'">'. $i .'</a>
                </li>
            ';
        }
        if($posts->currentPage() != $posts->lastPage()){
                $paginate = $paginate.'<li><a href="'.str_replace('/?','?',$posts->url($posts->currentPage() + 1)).'">&raquo;</a></li>';
        }
        return view('frontend.top_view',compact('list','paginate'));
    }

    public function getPost($cate_slug,$post_slug){

        $post = $this->post->getPostBySlug($post_slug);
        $user = Auth::guard('web')->user();
        if(Session::get('id') !== $post->id){
            Post::where('id',$post->id)->increment('view');
            Session::put('id', $post->id);
        }

        $topic = "";
        $admin      = Post::find($post->id)->admin->name;
        $category      = Post::find($post->id)->category->name;
        $name_topic = $post->name;

        $topic = $topic.'
                <div class="topic-top">
                    <h2>'.$post->name.'</h2>
                    <p>Đăng bởi: <a>'.$admin.'</a>  </p>
                    <p>Ngày Đăng &nbsp;'.$post->created_at.'</p>
                </div>
                <div class="topic-center">
                    '.$post->description.'
                </div>
                <div class="topic-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            <p><i class="fa fa-clock-o"></i> Update vào lúc '.$post->updated_at.'</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="pull-right">'.$post->view.' view</p>
                        </div>
                    </div>
                </div>
                ';

        $listcomment = "";

        $comments = $this->comment->getListCommentByPost($post->id);

        $count_comment = count($comments);

        foreach ($comments as $key => $item) {
            if ($item['status'] !== 1) {
                $listcomment = $listcomment.'
                <div class="show-cm">
                    <div class="row">
                        <div class="col-sm-2 cm-user">
                            <img src="" alt="anh user"> 
                        </div>
                        <div class="col-sm-10 ">
                            <div class="cm-content">
                                <div class="user">
                                    <a href="#">'.$user['name'].'</a>
                                </div>
                                <div class="content">
                                    Comment của bạn đã bị admin cho ra đảo
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
            $listcomment = $listcomment.'
            <div class="show-cm">
                <div class="row">
                    <div class="col-sm-2 cm-user">
                        <img src="" alt="anh user"> 
                    </div>
                    <div class="col-sm-10 ">
                        <div class="cm-content">
                            <div class="user">
                                <a href="#">'.$user['name'].'</a>
                            </div>
                            <div class="content">
                                '.$item['content'].'
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';

        }


        $commentform = "";
        if ($user['name'] == null) {
            $commentform = $commentform.'
            <span><a href="http://blogk.com.vn/login">Đăng nhập</a> để comment</span>';     
        }else{
            $commentform = $commentform.'
                  <div class="form-group">
                    <textarea  name="content" id="editor1" cols="50" rows="4"></textarea>
                    <script type="text/javascript">CKEDITOR.replace("editor1"); </script>
                  </div>
                  <button type="submit" class="btn btn-default">Comment</button>
                ';   
        }        

        return view('frontend.post',compact('cate_slug','topic','category','name_topic','commentform','listcomment','count_comment'));
    }
    


    public function getCategory(){
        $categories = $this->category->getListCategory();

        $list = "";

        foreach ($categories as $key => $item) {
            $admin      = Category::find($item['id'])->admin->name;
            $posts = $this->post->getListPostPaginateByCategory($item['id']);
            $count_post = count($posts);
            $list = $list.'
            <div class="media">
                <a class="pull-left" href="'.$item['slug'].'">
                    <i class="fa fa-file-text fa-3x"></i>
                </a>
                <div class="media-body">
                    <h5><a>'.$admin.'</a> '.$item['created_at'].' </h5>
                    <h4 class="media-heading"><a href="'.$item['slug'].'">'.$item['name'].'</a></h4><br/>
                    <h4 class="media-heading"><span style="color: #d9d9d9;">'.$item['content'].'</span></h4><br/>
                    <span class="score" data-toggle="tooltip" data-placement="bottom" title="Posts!" ><i class="fa fa-folder-open">&nbsp; '.$count_post.'</i></span>
                </div>
            </div>';
        }


        return view('frontend.categories',compact('list'));
    }

    public function getListPostByCategory($cate_slug){
        $cate = $this->category->getCategoryBySlug($cate_slug);
        $posts = $this->post->getListPostPaginateByCategory($cate->id);
        $list = "";

        foreach ($posts as $key => $item) {
            $admin      = Post::find($item['id'])->admin->name;
            //$category      = Post::find($item['id'])->category->slug;
            $comments = $this->comment->getListCommentByPost($item['id']);
            $count_comments = count($comments);
            $list = $list.'
            <div class="media">
                <a class="pull-left" href="post/'.$cate->slug.'/'.$item['slug'].'">
                    <i class="fa fa-file-text fa-3x"></i>
                </a>
                <div class="media-body">
                    <h5><a>'.$admin.'</a> '.$item['created_at'].' </h5>
                    <h4 class="media-heading"><a href="post/'.$cate->slug.'/'.$item['slug'].'">'.$item['name'].'</a>  </h4><br/>
                    <span class="score" data-toggle="tooltip" data-placement="bottom" title="Views!" ><i class="fa fa-eye">&nbsp; '.$item['view'].'</i></span>
                    <span class="score" data-toggle="tooltip" data-placement="bottom" title="Comments!" ><i class="fa fa-comments">&nbsp; '.$count_comments.'</i></span>
                </div>
            </div>';
        }
        $paginate = "";
          

        if ($posts->currentPage() != 1) {
            $paginate = $paginate.'
                  <li><a href="'.str_replace('/?','?',$posts->url($posts->currentPage() - 1)).'">&laquo;</a></li>
            ';
        }
        for($i = 1;$i <= $posts->lastPage() ; $i++){
            $paginate = $paginate.'
                <li class="active" >
                    <a  href="'.str_replace('/?','?',$posts->url($i)).'">'. $i .'</a>
                </li>
            ';
        }
        if($posts->currentPage() != $posts->lastPage()){
                $paginate = $paginate.'<li><a href="'.str_replace('/?','?',$posts->url($posts->currentPage() + 1)).'">&raquo;</a></li>';
        }
        return view('frontend.postbycate',compact('list','paginate'));
    }

    public function postComment(Request $request,$cate_slug,$post_slug){

        $post = $this->post->getPostBySlug($post_slug);
        $uri = $cate_slug.'/'.$post_slug;
        $comment =$this->comment;
        $user = Auth::guard('web')->user();
        $comment->content = $request->content;
        $comment->parent = 0;
        $comment->status = 1;
        $comment->user_id = $user['id'];
        $comment->post_id = $post->id;
        $comment->admin_id = 1;
        $comment->save();
        return redirect()->route('post',['cate' => $cate_slug, 'post' =>$post_slug]);
    }
}
