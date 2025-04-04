<?php

namespace App\Controllers\Faculty; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController


class FacultyClasses extends BaseController
{
    public function classes()
    {
        $data = [
            'title' => 'Class'
        ];
        
        return 
            view('templates/faculty/header', $data)
            . view('pages/faculty/classes')
            . view('templates/faculty/footer')
        ;
    }
}