<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerEvaluations extends Model
{
    protected $table = 'TrainerEvaluations';
    protected $primaryKey = 'TrainerEvaluationsId';
    public $timestamps = false;
    protected $fillable = [
        'TrainerRoundId',
        'StudentRoundsId',
        'RoundContentId',
        'Knowledge_Experience',
        'Training_Qualified',
        'Topics_Preparation',
        'Trainer_Attitude',
        'Time_Respect',
        'Student_Interaction',
        'Overall_Evaluation',
        'IsDone',
        'Notes',
    ];
}
