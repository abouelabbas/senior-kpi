<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEvaluations extends Model
{
    protected $table = 'StudentEvaluation';
    protected $primaryKey = 'StudentEvaluationId';
    public $timestamps = false;
    protected $fillable = [
        'StudentRoundId',
        'RoundContentId',
        'EvaluationDate',
        'Attendance',
        'TimeRespect',
        'Lecture_Practice',
        'Solve_Home_Tasks',
        'Student_Interaction',
        'Student_Attitude',
        'Student_Focus',
        'Understand_Speed',
        'Exam_Marks',
        'IsDone',
        'Overall',
        'Notes'
    ];
}
