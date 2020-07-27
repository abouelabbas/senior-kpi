<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoundContents extends Model
{
    protected $table = 'roundcontent';
    protected $primaryKey = 'RoundContentId';
    public $timestamps = false;
    protected $fillable = ['RoundId','Done','ContentNameEn','ContentNameAr','TrainerRoundsId'];
}
