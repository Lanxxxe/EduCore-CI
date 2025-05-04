<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController; 
use App\Models\PersonnelAccounts;
use App\Models\StudentsAccounts;

class Dashboard extends BaseController
{
    public function dashboard()
    {
        $studentsModel = model(StudentsAccounts::class);
        $personnelsModel = model(PersonnelAccounts::class);
        $data = [
            'registered_student' => $studentsModel->countTotalStudents(),
            'registered_personnel' => $personnelsModel->countPersonnelAccounts(),
            'title' => 'Home'
        ];
        
        return view('templates/admin/header', $data)
            . view('pages/admin/dashboard')
            . view('templates/admin/footer');
    }
}