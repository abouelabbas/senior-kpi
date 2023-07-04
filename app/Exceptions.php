<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exceptions extends Model
{
    protected $table = "exceptions";
    protected $primaryKey = 'ExceptionId';
    public $timestamps = false;
    protected $fillable = ['StudentId','ExceptionNotes', 'RoundId'];

}