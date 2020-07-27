<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerSubAgenda extends Model
{
    protected $table = "trainersubagenda";
    protected $primaryKey = 'TrainerSubAgendaId';
    public $timestamps = false;
    protected $fillable = ['TrainerAgendaId','SubAgendaNameAr','SubAgendaNameEn','Example','Task'];
}
