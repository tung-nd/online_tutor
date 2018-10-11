<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    public $timestamps = false;

    public function review()
    {
        return $this->hasMany('App\Review', 'id_user', 'id');
    }
}
