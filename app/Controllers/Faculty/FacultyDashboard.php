<?php

namespace App\Controllers\Faculty; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController
use App\Models\Classes;

class FacultyDashboard extends BaseController
{
    public function dashboard()
    {
        $session = session();
        $faculty_id = $session->get('user_id');
        $model = new Classes();

        $data = [
            'title' => 'Dashboard',
            'id' => $session->get('user_id'),
            'classes' => $model->getClasses($faculty_id),
            'numberOfClasses' => $model->countClasses($faculty_id)
        ];
        
        return 
            view('templates/faculty/header', $data)
            . view('pages/faculty/dashboard')
            . view('templates/faculty/footer')
        ;
    }


    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/faculty');
    }
}