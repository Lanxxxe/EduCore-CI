<?php

namespace App\Models;

use CodeIgniter\Model;

class Classes extends Model {
    protected $table = 'classes';
    protected $allowedFields = [
        'title', 'course_code', 'description', 'faculty_id'
    ];


    public function getClasses($facultyID){
        return $this->where(['faculty_id' => $facultyID])->findAll();
    }


}