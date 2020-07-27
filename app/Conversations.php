<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversations extends Model
{
    protected $table = 'conversations';
    protected $primaryKey = 'ConversationId';
    public $timestamps = false;
    protected $fillable = ['User_one','User_two','Role_one','Role_two'];
}
