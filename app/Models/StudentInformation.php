<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentInformation extends Model {
    protected $table = 'students_information'; 
    protected $allowedFields = ['student_id', 'firstname', 'middlename', 'lastname', 'program', 'age', 'birthday'];


    public function getStudentsInformation($studentID = false) {
        if ($studentID === false) {
            return $this->findAll();
        }
        
        return $this->where(['id' => $studentID])->first();
    }

}