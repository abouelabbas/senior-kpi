<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentVideos extends Model
{
    protected $table = 'studentvideos';
    protected $primaryKey = 'StudentVideoId';
    public $timestamps = false;
    protected $fillable = ['StudentVideoTitle', 'StudentVideoLink', 'StudentVideoType'];
}
