<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    protected $table = 'Exams';
    protected $primaryKey = 'ExamId';
    public $timestamps = false;
    protected $fillable = ['TrainerCoursesId','ExamNameAr','ExamNameEn','ExamMaxGrade','IsGrade'];
}
