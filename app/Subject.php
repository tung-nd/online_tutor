<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subject';
    public $timestamps = false;

    public function teaching()
    {
        return $this->hasMany('App\Teaching', 'id_subject', 'id');
    }
}
