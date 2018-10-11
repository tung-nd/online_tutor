<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutor';
    public $timestamps = false;

    public function school()
    {
        return $this->belongsTo('App\School', 'id_school', 'id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject', 'id_subject', 'id');
    }

    public function review()
    {
        return $this->hasMany('App\Review', 'id_tutor', 'id');
    }

    public static function searchTutor($infor)
    {

    }

    public static function getDetail($id)
    {

    }

}
