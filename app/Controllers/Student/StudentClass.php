<?php

namespace App\Controllers\Student; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController


class StudentClass extends BaseController
{
    public function class()
    {
        $data = [
            'title' => 'Classes',
            'page' => 'Class'
        ];
        
        return 
            view('templates/student/header', $data)
            . view('pages/students/class')
            . view('templates/student/footer')
        ;
    }
}