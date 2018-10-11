<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'school';
    public $timestamps = false;

    public function tutor()
    {
        return $this->hasMany('App\Tutor', 'id_school', 'id');
    }
}
