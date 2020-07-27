<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Trainers extends Model
{
    use Notifiable;

    protected $guard = 'trainers';
    protected $dates = ['Birthdate','JoinDate'];
    protected $table = "trainers";
    protected $primaryKey = 'TrainerId';
    public $timestamps = false;
    protected $fillable = ['FullnameAr','FullnameEn','Email','Phone','Password','Birthdate','Company','Job','ImagePath','ExternalCourses','AdditionalNotes','Facebook','Youtube','Linkedin','SecondPhone','Address','resumeLink'];


    public function rounds() {
        return $this->belongsToMany('App\Round', 'TrainerRounds')->withPivot('TrainerRoundsId','TrainerId','RoundId');
    }
}
