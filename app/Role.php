<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
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
}
