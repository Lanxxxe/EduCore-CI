<?php

namespace App\Controllers\Faculty; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController


class FacultyDashboard extends BaseController
{
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        
        return 
        
            view('templates/faculty/header', $data)
            . view('pages/faculty/dashboard')
            . view('templates/faculty/footer')
        ;
    }
}