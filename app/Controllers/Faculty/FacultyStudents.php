<?php
namespace App\Controllers\Faculty; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController
use App\Models\PersonnelAccounts;
use App\Models\Classes;

class FacultyStudents extends BaseController
{
    public function students() {
        $session = session();
        $faculty_id = $session->get('user_id');
        $personnelAccount = new PersonnelAccounts();
        $studentsInClass = new Classes();
        


        $data = [
            'title' => 'Students',
            'faculty' => $personnelAccount->getPersonnelsAccounts($faculty_id),
            'students' => $studentsInClass->getStudentsInClasses($faculty_id)
        ];
        
        return 
            view('templates/faculty/header', $data)
            . view('pages/faculty/students')
            . view('templates/faculty/footer')
        ;
    }

}