<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraContent extends Model
{
    protected $table = 'extracontent';
    protected $primaryKey = 'ContentId';
    public $timestamps = false;
    protected $fillable = [
        "ContentName",
        "RoundId",
        "ContentURL",
        "Level",
        "Type",
        "ContentOrder",
    ];
}
