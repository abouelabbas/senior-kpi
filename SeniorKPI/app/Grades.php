<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    protected $table = 'Grades';
    protected $primaryKey = 'GradeId';
    public $timestamps = false;
    protected $fillable = ['SessionId','StudentRoundId','TaskGrade','QuizGrade','MaxValTask','MaxValQuiz'];
}
