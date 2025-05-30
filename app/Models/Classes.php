<?php

namespace App\Models;

use CodeIgniter\Model;

class Classes extends Model {
    protected $table = 'classes';
    protected $allowedFields = [
        'class_name', 'description', 'course_code', 'faculty_id', 'created_at'
    ];


    public function getClasses($facultyID){
        return $this->where(['faculty_id' => $facultyID])->findAll();
    }


}