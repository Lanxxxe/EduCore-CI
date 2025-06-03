<?php

namespace App\Controllers\Student; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController


class StudentHome extends BaseController
{
    public function home()
    {
        $data = [
            'title' => 'Home',
            'page' => 'Dashboard'
        ];
        
        return 
            view('templates/student/header', $data)
            . view('pages/students/home')
            . view('templates/student/footer')
        ;
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}