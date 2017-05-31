<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'id','content','parent','status','user_id','post_id', 'admin_id',
    ];

   
    public function admin(){
        return $this->belongsTo('App\Admin','admin_id');
    }
    public function post(){
        return $this->belongsTo('App\Post','post_id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function other(){
        return $this->hasMany('App\OtherComment','id');
    }

    public function getListCommentByPost($id){
        return self::select('id','content','parent','status','user_id','post_id','admin_id')->where('post_id',$id)->orderBy('id','DESC')->paginate(10);
    }


     public function getListComment()
    {
        return self::get();
    }

    public function getCommentByID($id)
    {
        return self::find($id);
    }
}
