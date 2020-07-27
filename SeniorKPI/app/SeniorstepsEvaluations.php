<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeniorstepsEvaluations extends Model
{
    protected $table = 'SeniorStepsEvaluations';
    protected $primaryKey = 'SeniorstepsEvaluationsId';
    public $timestamps = false;
    protected $fillable = [
        'StudentRoundId',
        'RoundContentId',
        'Students_Deal',
        'Solving_Problems',
        'Buffet_Quality',
        'General_Cleanliness',
        'Recepitionist_Quality',
        'Answering_Calls_Quality',
        'Social_Media_Quality',
        'Overall_Evaluation',
        'IsDone',
    ];
}
