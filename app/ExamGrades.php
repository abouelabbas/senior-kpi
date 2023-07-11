<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamGrades extends Model
{
    protected $table = 'examgrades';
    protected $primaryKey = 'ExamGradesId';
    public $timestamps = false;
    protected $fillable = ['File','ExamNotes','Grade','StudentRoundId','ExamId','Evaluation','IsDone'];
}
