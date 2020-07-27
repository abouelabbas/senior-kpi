<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'Messages';
    protected $primaryKey = 'MessageId';
    public $timestamps = false;
    protected $fillable = ['ConversationId','Message','User_from','User_to','status'];
}
