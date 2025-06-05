<?php

namespace App\Controllers\Student; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController

use App\Models\ClassStudents;
use App\Models\StudentInformation;

class StudentHome extends BaseController
{
    public function home()
    {
        $session = session();
        // Check if user is logged in and is student
        if ($session->get('user_role') !== 'student') {
            // Optionally set a flash message
            $session->setFlashdata('error', 'Access denied.');
            // Redirect to login or another page
            return redirect()->to('/');
        }
        $studentID = $session->get('user_id');
        $classStudents = new ClassStudents(); 
        $student = new StudentInformation();
        $classes = $classStudents->getActiveClasses($studentID);

        $data = [
            'title' => 'Home',
            'page' => 'Dashboard',
            'id' => $session->get('user_id'),
            'classes' => $classes['classes'],
            'class_count' => $classes['count'],
            'student' => $student->studentInformation($studentID),
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