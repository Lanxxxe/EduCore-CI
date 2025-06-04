<?php
namespace App\Models;

use CodeIgniter\Model;

class GradesModel extends Model
{
    protected $table = 'grades';
    protected $allowedFields = ['student_id', 'class_id', 'midterm', 'finals', 'gwa'];

    // Get grades for all students in a class
    public function getGradesByClass($class_id)
    {
        return $this->db->table('class_students')
            ->select('
                students_information.id as student_id,
                students_information.firstname,
                students_information.lastname,
                students_information.student_id as student_number,
                grades.midterm,
                grades.finals,
                grades.gwa
            ')
            ->join('students_information', 'students_information.id = class_students.student_id')
            ->join('grades', 'grades.student_id = class_students.student_id AND grades.class_id = class_students.class_id', 'left')
            ->where('class_students.class_id', $class_id)
            ->get()
            ->getResultArray();
    }

    // Get a single student's grades for a class
    public function getStudentGrade($student_id, $class_id)
    {
        return $this->where(['student_id' => $student_id, 'class_id' => $class_id])->first();
    }

    public function getGradesByStudent($student_id)
    {
        return $this->db->table('class_students')
            ->select('
                classes.title as course_title,
                classes.description as course_description,
                classes.course_code,
                grades.midterm,
                grades.finals,
                grades.gwa,
            ')
            ->join('classes', 'classes.id = class_students.class_id')
            ->join('grades', 'grades.class_id = class_students.class_id AND grades.student_id = class_students.student_id', 'left')
            ->where('class_students.student_id', $student_id)
            ->get()
            ->getResultArray();
    }
}