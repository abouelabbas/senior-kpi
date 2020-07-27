<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoundDays extends Model
{
    protected $table = 'rounddays';
    protected $primaryKey = 'RoundDaysId';
    public $timestamps = false;
    protected $fillable = ['DayId','RoundId','From','To'];
}
