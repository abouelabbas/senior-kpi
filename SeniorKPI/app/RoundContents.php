<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoundContents extends Model
{
    protected $table = 'RoundContent';
    protected $primaryKey = 'RoundContentId';
    public $timestamps = false;
    protected $fillable = ['RoundId','Done','ContentNameEn','ContentNameAr','TrainerRoundsId'];
}
