<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController; 
use App\Models\PersonnelAccounts;
use App\Models\StudentsAccounts;
use App\Models\Classes;

class Dashboard extends BaseController
{
    public function dashboard()
    {
        $session = session();
        // Check if user is logged in and is admin
        if ($session->get('user_role') !== 'admin') {
            // Optionally set a flash message
            $session->setFlashdata('error', 'Access denied.');
            // Redirect to login or another page
            return redirect()->to('/admin');
        }
        $studentsModel = new StudentsAccounts();
        $personnelsModel = new PersonnelAccounts();
        $classModel = new Classes();
        $data = [
            'registered_student' => $studentsModel->countTotalStudents(),
            'registered_personnel' => $personnelsModel->countPersonnelAccounts(),
            'classes' => $classModel->countClasses(),
            'title' => 'Home'
        ];
        
        return view('templates/admin/header', $data)
            . view('pages/admin/dashboard')
            . view('templates/admin/footer');
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->route('admin');
    }
}