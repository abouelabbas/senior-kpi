<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = "tasks";
    protected $primaryKey = 'TaskId';
    public $timestamps = false;
    protected $fillable = ['TaskNotes','StudentRoundId','SessionId','TaskURL','IsGrade','TaskComment','TaskDate'];

}
