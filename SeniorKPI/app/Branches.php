<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{    
    protected $table = 'Branches';
    protected $primaryKey = 'BranchId';
    public $timestamps = false;
    protected $fillable = ['BranchNameEn','BranchNameAr','BranchAddress','BranchLocation'];
}
