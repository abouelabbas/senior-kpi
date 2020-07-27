<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    protected $table = 'sessions';
    protected $primaryKey = 'SessionId';
    public $timestamps = false;
    protected $dates = [
        'StartDate',
    ];
    protected $fillable = ['IsDone','SessionNumber','SessionMaterial','SessionVideo','SessionTask','SessionQuiz','RoundId','QuizText','MaterialText','VideoText','TaskText','SessionDate','Notes'];

}
