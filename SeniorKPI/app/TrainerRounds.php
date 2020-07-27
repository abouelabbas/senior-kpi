<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerRounds extends Model
{
    protected $table = "TrainerRounds";
    protected $primaryKey = 'TrainerRoundsId';
    public $timestamps = false;
    protected $fillable = ['TrainerId','RoundId'];
}
