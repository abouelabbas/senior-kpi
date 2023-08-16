<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraTaskSubmissions extends Model
{
    protected $table = 'extratasksubmissions';
    protected $primaryKey = 'SubmissionId';
    public $timestamps = false;
    protected $fillable = ['ExtraTaskId', 'StudentRoundId', 'SubmissionLink', 'SubmissionNotes', 'SubmissionComment', 'SubmissionGrade', 'SubmissionDate'];
}