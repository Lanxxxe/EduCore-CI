<?php

namespace App\Controllers\Student; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController


class StudentGrades extends BaseController
{
    public function grades()
    {
        $data = [
            'title' => 'Grades',
            'page' => 'Grades'
        ];
        
        return 
            view('templates/student/header', $data)
            . view('pages/students/grades')
            . view('templates/student/footer')
        ;
    }
}