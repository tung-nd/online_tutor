<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subject';
    public $timestamps = false;

    public function tutor()
    {
        return $this->hasMany('App\Tutor', 'id_subject', 'id');
    }
}
