<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teaching extends Model
{
    protected $table = 'teaching';
    public $timestamps = false;

    public function tutor()
    {
        return $this->belongsTo('App\Tutor', 'id_tutor', 'id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject', 'id_subject', 'id');
    }
}
