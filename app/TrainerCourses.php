<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerCourses extends Model
{
    protected $table = "trainercourses";
    protected $primaryKey = 'TrainerCoursesId';
    public $timestamps = false;
    protected $fillable = ['TrainerId','CourseId'];
}
