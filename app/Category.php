<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id','name', 'slug','image','parent', 'content', 'id_admin',
    ];


    public function admin(){
        return $this->belongsTo('App\Admin','id_admin');
    }
    public function news(){
        return $this->hasMany('App\News','id');
    }
}
