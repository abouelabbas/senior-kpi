<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerAgenda extends Model
{
    protected $table = "traineragenda";
    protected $primaryKey = 'TrainerAgendaId';
    public $timestamps = false;
    protected $fillable = ['TrainerCoursesId','ContentId'];
}
