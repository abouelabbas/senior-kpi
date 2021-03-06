<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labs extends Model
{
    protected $table = 'labs';
    protected $primaryKey = 'LabId';
    public $timestamps = false;
    protected $fillable = ['LabNumber','LabCapacity','BranchId'];
}
