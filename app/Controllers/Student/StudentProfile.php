<?php

namespace App\Controllers\Student; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController


class StudentProfile extends BaseController
{
    public function profile()
    {
        $data = [
            'title' => 'Profile',
            'page' => 'Profile'
        ];
        
        return 
            view('templates/student/header', $data)
            . view('pages/students/profile')
            . view('templates/student/footer')
        ;
    }
}