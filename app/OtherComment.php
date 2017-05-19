<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherComment extends Model
{
    protected $fillable = [
        'id','content','status','comment_id','user_id','news_id', 'admin_id',
    ];

   
    public function admin(){
        return $this->belongsTo('App\Admin','admin_id');
    }
    public function news(){
        return $this->belongsTo('App\News','news_id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function comment(){
        return $this->belongsTo('App\Comment','comment_id');
    }
}
