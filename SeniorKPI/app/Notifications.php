<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = 'Notifications';
    protected $primaryKey = 'NotificationId';
    public $timestamps = false;
    protected $fillable = ['Notification','IsRead','ForId','ForType'];
}
