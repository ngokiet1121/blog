<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'id','name','slug','description','view', 'admin_id', 'category_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function admin(){
        return $this->belongsTo('App\Admin','admin_id');
    }
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    public function comment(){
        return $this->hasMany('App\Comment','id');
    }
    public function other(){
        return $this->hasMany('App\OtherComment','id');
    }

    public function getListPost()
    {
        return self::get();
    }
    public function getListPostPaginateNew()
    {
        return self::select('id','name','slug','description','view', 'admin_id', 'category_id')->orderBy('id','DESC')->paginate(10);
    }
    public function getListPostPaginateTopView()
    {
        return self::select('id','name','slug','description','view', 'admin_id', 'category_id')->orderBy('view','DESC')->paginate(10);
    }
    public function getListPostPaginateByCategory($id)
    {
        return self::select('id','name','slug','description','view', 'admin_id', 'category_id')->where('category_id',$id)->orderBy('view','DESC')->paginate(10);
    }
    public function getPostByID($id)
    {
        return self::find($id);
    }
    public function getPostBySlug($slug){
        return DB::table('posts')->where('slug',$slug)->get()->first();
    }

}
