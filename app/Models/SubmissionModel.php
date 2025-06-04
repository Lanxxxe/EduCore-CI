<?php

namespace App\Models;

use CodeIgniter\Model;

class SubmissionModel extends Model
{
    protected $table = 'submission';
    protected $allowedFields = [
        'student_id', 'activity_id', 'submission_date', 'remarks', 'score', 'filepath'
    ];
}