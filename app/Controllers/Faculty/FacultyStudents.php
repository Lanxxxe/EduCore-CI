<?php
namespace App\Controllers\Faculty; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController


class FacultyStudents extends BaseController
{
    public function students() {
        $data = [
            'title' => 'Students'
        ];
        
        return 
            view('templates/faculty/header', $data)
            . view('pages/faculty/students')
            . view('templates/faculty/footer')
        ;
    }

}