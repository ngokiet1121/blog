<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

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
    public function post(){
        return $this->hasMany('App\Post','id');
    }
    public function comment(){
        return $this->hasMany('App\Comment','id');
    }
    public function other(){
        return $this->hasMany('App\OtherComment','id');
    }
    public function getListStaff()
    {
        return self::select('id','name', 'email', 'password','phone', 'address','status', 'role_id')->where('role_id', '<>', 1)->orderBy('id','DESC')->get()->toArray();
    }

    public function getStaffByID($id)
    {
        return self::find($id);
    }
}
