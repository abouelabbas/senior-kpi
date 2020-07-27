<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rounds extends Model
{
    protected $table = 'Rounds';
    protected $primaryKey = 'RoundId';
    public $timestamps = false;
    protected $fillable = ['CourseId','GroupNo','StartDate','EndDate','LabId','Done','Notes'];
    // protected $dates = [
    //     'StartDate',
    //     'EndDate',
    // ];
    // // protected $casts = [
    //     'StartDate'  => 'date:y-m-d',
    //     'EndDate'  => 'date:y-m-d',
    //     // 'EndDate' => 'datetime:Y-m-d H:00',
    // ];
}
