<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CenterEvaluations extends Model
{
    protected $table = 'CenterEvaluations';
    protected $primaryKey = 'CenterEvaluationId';
    public $timestamps = false;
    protected $fillable = [
        'PersonId',
        'PersonType',
        'RoundContentId',
        'EvaluationDate',
        'Projectors_Quality',
        'Air_Conditioners',
        'Seats_Quality',
        'Lab_Cleaning',
        'Lab_Capacity',
        'Overall_Evaluation',
        'Notes',
        'IsDone'
    ];
}
