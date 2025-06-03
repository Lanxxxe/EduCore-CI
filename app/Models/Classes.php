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

    public function countClasses($facultyID){
        return $this->where(['faculty_id' => $facultyID])->countAllResults();
    }

    public function checkClass($courseCode){
        return $this->where(['course_code' => $courseCode])->first();
    }

    public function getStudentsClasses($studentID) {
        $builder = $this->db->table('class_students');
        $builder->select('classes.*, school_personnel.firstname, school_personnel.lastname');
        $builder->join('classes', 'class_students.class_id = classes.id');
        $builder->join('school_personnel', 'classes.faculty_id = school_personnel.id');
        $builder->where('class_students.student_id', $studentID);
        
        return $builder->get()->getResultArray();
    }
}