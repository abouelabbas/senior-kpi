<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamGrades extends Model
{
    protected $table = 'ExamGrades';
    protected $primaryKey = 'ExamGradesId';
    public $timestamps = false;
    protected $fillable = ['Grade','StudentRoundId','ExamId','Evaluation','IsDone'];
}
