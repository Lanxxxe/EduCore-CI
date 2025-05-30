<?php
namespace App\Controllers\Faculty; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController


class FacultyGrades extends BaseController
{
    public function grades() {
        $data = [
            'title' => 'Grades'
        ];
        
        return 
            view('templates/faculty/header', $data)
            . view('pages/faculty/grades')
            . view('templates/faculty/footer')
        ;
    }

}