<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoundEvaluations extends Model
{
    protected $table = 'RoundEvaluations';
    protected $primaryKey = 'RoundEvaluationId';
    public $timestamps = false;
    protected $fillable = [
        'RoundContentId',
        'StudentRoundId',
        'Course_Wealthy',
        'Enough_Hours',
        'Enough_Practice',
        'Materials_Evaluation',
        'Suitable_Price',
        'Overall_Education',
        'IsDone',
        'Notes'
    ];
}
