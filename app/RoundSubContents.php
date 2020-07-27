<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoundSubContents extends Model
{
    protected $table = 'roundsubcontents';
    protected $primaryKey = 'RoundSubContentsId';
    public $timestamps = false;
    protected $fillable = ['RoundContentId','SubContentAr','SubContentEn','PointDone','Example','Task','DoneTask','DoneExample'];
}
