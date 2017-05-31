<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Category extends Model
{
	protected $table = 'categories';
    protected $fillable = [
        'id','name','slug','image','parent', 'content', 'id_admin',
    ];


    public function admin(){
        return $this->belongsTo('App\Admin','id_admin');
    }
    public function post(){
        return $this->hasMany('App\Post','id');
    }

    public function getListCategory()
    {
        return self::get();
    }

    public function getCategoryByID($id)
    {
        return self::find($id);
    }
    public function getCategoryBySlug($slug){
        return DB::table('categories')->where('slug',$slug)->get()->first();
    }
}
