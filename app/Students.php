<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $dates = ['Birthdate','JoinDate'];
    protected $table = "students";
    protected $primaryKey = 'StudentId';
    public $timestamps = false;
    protected $fillable = ['FullnameAr','FullnameEn','Email','Phone','Password','Birthdate','Company','Job','ImagePath','AdditionalNotes'];

    public function rounds() {
        return $this->belongsToMany('App\Round', 'studentrounds')->withPivot('StudentRoundId','StudentId','RoundId');
    }
}
