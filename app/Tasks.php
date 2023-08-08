<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = "tasks";
    protected $primaryKey = 'TaskId';
    public $timestamps = false;
    protected $fillable = ['PracticeComment','PracticeURL','PracticeNotes','SecondaryDeadline','TaskNotes','StudentRoundId','SessionId','TaskURL','IsGrade','TaskComment','TaskDate'];

}
