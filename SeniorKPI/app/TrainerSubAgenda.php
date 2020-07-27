<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerSubAgenda extends Model
{
    protected $table = "TrainerSubAgenda";
    protected $primaryKey = 'TrainerSubAgendaId';
    public $timestamps = false;
    protected $fillable = ['TrainerAgendaId','SubAgendaNameAr','SubAgendaNameEn','Example','Task'];
}
