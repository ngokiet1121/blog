<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table ='admins';
    protected $fillable = [
        'id','name', 'email', 'password','phone', 'address','status', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   /* protected $hidden = [
        'password', 'remember_token',
    ];*/
    public function role(){
        return $this->belongsTo('App\Role','role_id');
    }
    public function user(){
        return $this->hasMany('App\User','id');
    }
    public function category(){
        return $this->hasMany('App\Category','id');
    }
    public function news(){
        return $this->hasMany('App\News','id');
    }
    public function comment(){
        return $this->hasMany('App\Comment','id');
    }
    public function other(){
        return $this->hasMany('App\OtherComment','id');
    }
    public function getAll()
    {
        return self::get();
    }
}
