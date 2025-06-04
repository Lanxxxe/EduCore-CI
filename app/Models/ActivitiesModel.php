<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivitiesModel extends Model
{
    protected $table = 'activities';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'activity_type', 'title', 'description', 'deadline', 'max_score', 'class_id'
    ];

    public function getActivities($classId){
        return $this->where(['class_id' => $classId])->findall();
    }
}
