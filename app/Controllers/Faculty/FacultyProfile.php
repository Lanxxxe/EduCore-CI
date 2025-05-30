<?php
namespace App\Controllers\Faculty; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController


class FacultyProfile extends BaseController
{
    public function profile() {
        $data = [
            'title' => 'Grades'
        ];
        
        return 
            view('templates/faculty/header', $data)
            . view('pages/faculty/profile')
            . view('templates/faculty/footer')
        ;
    }

}