<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $table = 'Admins';
    protected $primaryKey = 'AdminId';
    public $timestamps = false;
    protected $fillable = ['AdminNameAr','AdminNameEn','Email','Phone','Password','Birthdate','Company','Job','ImagePath','AdditionalNotes'];
    
}
