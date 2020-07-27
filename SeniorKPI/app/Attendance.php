<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'Attendance';
    protected $primaryKey = 'AttendanceId';
    public $timestamps = false;
    protected $fillable = ['SessionId','StudentRoundsId','IsAttend','Notes'];
}
