<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentRounds extends Model
{
    protected $table = "studentrounds";
    protected $primaryKey = 'StudentRoundsId';
    public $timestamps = false;
    protected $fillable = ['StudentId','RoundId'];


}
