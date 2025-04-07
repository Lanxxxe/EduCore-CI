<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentsAccounts extends Model {
    protected $table = 'students_account'; 
    protected $allowedFields = [
        'student_id', 'email', 'password'
    ];
    
    public function getStudentsAccounts($studentID = false) {
        if ($studentID === false) {
            return $this->findAll();
        }
        
        return $this->where(['id' => $studentID])->first();
    }
}