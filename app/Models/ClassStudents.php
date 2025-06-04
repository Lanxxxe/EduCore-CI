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


    public function getActiveClasses($studentID)
    {
        $builder = $this->select('classes.id as class_id, classes.title, classes.description, school_personnel.firstname, school_personnel.lastname')
                    ->join('classes', 'classes.id = class_students.class_id')
                    ->join('school_personnel', 'school_personnel.id = classes.faculty_id')
                    ->where('class_students.student_id', $studentID);

        $results = $builder->findAll();
        return [
            'classes' => $results,
            'count' => count($results)
        ];
    }
}