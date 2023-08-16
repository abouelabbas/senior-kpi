<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraTasks extends Model
{
    protected $table = 'extratasks';
    protected $primaryKey = 'ExtraTaskId';
    public $timestamps = false;
    protected $fillable = ['SessionId','ExtraTaskLink','ExtraTaskDesc', 'ExtraTaskLevel', 'ExtraTaskType', 'ExtraTaskDate'];
}
