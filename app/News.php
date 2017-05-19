<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
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
}
