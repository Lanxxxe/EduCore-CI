<?php

namespace App\Controllers\Student; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController

use App\Models\GradesModel;


class StudentGrades extends BaseController
{
    public function grades()
    {
        $session = session();
        // Check if user is logged in and is student
        if ($session->get('user_role') !== 'student') {
            // Optionally set a flash message
            $session->setFlashdata('error', 'Access denied.');
            // Redirect to login or another page
            return redirect()->to('/');
        }
        $student_id = $session->get('user_id');
        $gradesModel = new GradesModel();
        $grades = $gradesModel->getGradesByStudent($student_id);

        $totalGwa = 0;
        $gwaCount = 0;
        foreach ($grades as $grade) {
            if (isset($grade['gwa']) && is_numeric($grade['gwa'])) {
                $totalGwa += $grade['gwa'];
                $gwaCount++;
            }
        }
        $overallGpa = $gwaCount > 0 ? round($totalGwa / $gwaCount, 2) : 'N/A';

        $data = [
            'title' => 'Grades',
            'page' => 'Grades',
            'grades' => $grades,
            'gpa' => $overallGpa
        ];
        
        return 
            view('templates/student/header', $data)
            . view('pages/students/grades')
            . view('templates/student/footer')
        ;
    }
}