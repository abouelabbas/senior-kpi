<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'CourseId';
    public $timestamps = false;
    protected $fillable = ['CourseNameAr','CourseNameEn','Duration','CategoryId','Active','CourseCost','DescriptionEn','DescriptionAr','Notes'];
}
