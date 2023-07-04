<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskHistory extends Model
{
    protected $table = "taskhistory";
    protected $primaryKey = 'HistoryId';
    public $timestamps = false;
    protected $fillable = ['TaskGrade','TaskId', 'TaskNotes', 'TaskURL', 'IsGraded', 'TaskComment', 'TaskDate'];

}