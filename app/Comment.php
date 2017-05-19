<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id','content','status','user_id','news_id', 'admin_id',
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
    public function other(){
        return $this->hasMany('App\OtherComment','id');
    }
}
