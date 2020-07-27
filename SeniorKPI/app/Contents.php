<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    protected $table = 'Contents';
    protected $primaryKey = 'ContentId';
    public $timestamps = false;
    protected $fillable = ['ContentNameEn','ContentNameAr'];
}
