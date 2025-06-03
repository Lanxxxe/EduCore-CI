<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassStudents extends Model {
    protected $table = 'class_students';
    protected $allowedFields = [
        'class_id', 'student_id'
    ];

    public function joinClassStudents($studentID, $classID){
        return $this->insert([
            'class_id' => $classID,
            'student_id' => $studentID
        ]);
    }
}