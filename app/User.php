<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','name', 'email', 'password','phone', 'address', 'status','admin_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function admin(){
        return $this->belongsTo('App\Admin','admin_id');
    }
    public function comment(){
        return $this->hasMany('App\Comment','id');
    }

     public function getListUser()
    {
        return self::get();
    }

    public function getUserByID($id)
    {
        return self::find($id);
    }

}
