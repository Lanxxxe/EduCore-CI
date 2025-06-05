<?php

namespace App\Models;

use CodeIgniter\Model;

class Classes extends Model {
    protected $table = 'classes';
    protected $allowedFields = [
        'title', 'course_code', 'description', 'faculty_id'
    ];

    public function getClasses($facultyID){
        return $this->select('
            classes.*,
            COUNT(DISTINCT class_students.student_id) AS student_count,
            COUNT(DISTINCT activities.id) AS activity_count
        ')
        ->join('class_students', 'class_students.class_id = classes.id', 'left')
        ->join('activities', 'activities.class_id = classes.id', 'left')
        ->where('classes.faculty_id', $facultyID)
        ->groupBy('classes.id')
        ->findAll();
    }

    public function countClasses($facultyID = False){
        if ($facultyID === False) {
            return $this->countAll();
        }
        return $this->where(['faculty_id' => $facultyID])->countAllResults();
    }

    public function countTotalStudents($facultyID){
        return $this->db->table('class_students')
        ->select('COUNT(DISTINCT class_students.student_id) AS total_students')
        ->join('classes', 'classes.id = class_students.class_id')
        ->where('classes.faculty_id', $facultyID)
        ->get()
        ->getRow()
        ->total_students;
    }

    public function checkClass($courseCode){
        return $this->where(['course_code' => $courseCode])->first();
    }

    public function getClass($class_id) {
        return $this->where(['id'=> $class_id])->first();
    }

    public function getStudentsClasses($studentID) {
        $builder = $this->db->table('class_students');
        $builder->select('classes.*, school_personnel.firstname, school_personnel.lastname');
        $builder->join('classes', 'class_students.class_id = classes.id');
        $builder->join('school_personnel', 'classes.faculty_id = school_personnel.id');
        $builder->where('class_students.student_id', $studentID);
        
        return $builder->get()->getResultArray();
    }

    public function getStudentsInClasses($facultyID) {
        $builder = $this->db->table('class_students');

        $builder->select('
            class_students.*,
            students_information.firstname AS student_firstname,
            students_information.lastname AS student_lastname,
            students_information.student_id,
            students_account.email AS student_email,
            students_account.student_id as student_code,
            classes.course_code,
            classes.title,
        ');

        $builder->join('students_information', 'class_students.student_id = students_information.id');
        $builder->join('students_account', 'students_information.student_id = students_account.id');
        $builder->join('classes', 'class_students.class_id = classes.id');

        // Filter only classes that belong to this faculty
        $builder->where('classes.faculty_id', $facultyID);

        return $builder->get()->getResultArray();
    }

    public function getClassWithActivities($class_id) {
        return $this->select('classes.*, activities.id AS activity_id, activities.title AS activity_title, activities.description AS activity_description, activities.deadline')
                    ->join('activities', 'activities.class_id = classes.id', 'left')
                    ->where('classes.id', $class_id)
                    ->orderBy('activities.deadline', 'ASC')
                    ->findAll();
    }

    
    
}