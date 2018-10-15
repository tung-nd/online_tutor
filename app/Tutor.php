<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Review;
use App\Teaching;

class Tutor extends Model
{
    protected $table = 'tutor';
    public $timestamps = false;

    public function school()
    {
        return $this->belongsTo('App\School', 'id_school', 'id');
    }

    public function teaching()
    {
        return $this->hasMany('App\Teaching', 'id_tutor', 'id');
    }

    public function review()
    {
        return $this->hasMany('App\Review', 'id_tutor', 'id');
    }

    public static function searchTutor($infor)
    {
        $tutor_list = DB::table('tutor')
                        ->join('school', 'school.id', '=', 'tutor.school_id')
                        ->join('teaching', 'teaching.id_tutor', '=', 'tutor.id')
                        ->join('subject', 'subject.id', '=', 'teaching.id_subject')
                        ->where("tutor.ho_ten", "like", "%$infor%")
                        ->orWhere("tutor.dia_chi", "like", "%$infor%")
                        ->orWhere("school.ten", "like", "%$infor%")
                        ->orWhere("subject.ten_tieng_viet", "like", "%$infor%")
                        ->orWhere("subject.ten_tieng_anh", "like", "%$infor%")
                        ->get();
        return $tutor_list;
    }

    public static function getDetail($id)
    {
        $tutor = DB::table('tutor')
                    ->where("id", "=", "$id")
                    ->join('school', 'school.id', '=', 'tutor.school_id')
                    ->get();
        $teaching_subjects = DB::table("teaching")
                                ->where("id_tutor", "=", "$id")
                                ->join("subject", "subject.id", "=", "teaching.id")
                                ->get();
        $reviews = DB::table('review')
                    ->where("id_tutor", "=", "$id")
                    ->join("user", "user.id", "=", "review.id_user")
                    ->get();
        return ["tutor" => $tutor[0], "teaching_subject" => $teaching_subjects,"reviews" => $reviews];
    }
}
