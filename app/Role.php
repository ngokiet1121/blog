<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'id','name', 'content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function admin(){
        return $this->hasmany('App\Admin','id');
    }

    public function getListRole()
    {
        return self::get();
    }
    
    public function getRoleByID($id)
    {
        return self::find($id);
    }
}
