<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentInformation extends Model {
    protected $table = 'students_information'; 
    protected $allowedFields = ['id', 'student_id', 'firstname', 'middlename', 'lastname', 'program', 'age', 'birthday'];


    public function getStudentsInformation($studentID = false) {
        if ($studentID === false) {
            return $this->findAll();
        }
        
        return $this->where(['student_id' => $studentID])->first();
    }

    public function studentInformation($studentID) {
        return $this->where(['id' => $studentID])->first();
    }
}