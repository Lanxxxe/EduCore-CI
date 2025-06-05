<?php

namespace App\Controllers\Student; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController
use App\Models\GradesModel;

class StudentProfile extends BaseController
{
    public function profile()
    {
        $session = session();
        // Check if user is logged in and is student
        if ($session->get('user_role') !== 'student') {
            // Optionally set a flash message
            $session->setFlashdata('error', 'Access denied.');
            // Redirect to login or another page
            return redirect()->to('/');
        }
        $studentID = $session->get('user_id'); // or the correct session key

        $studentInfoModel = new \App\Models\StudentInformation();
        $studentAccountModel = new \App\Models\StudentsAccounts();

        $student = $studentInfoModel->studentInformation($studentID);
        $account = $studentAccountModel->getStudentsAccounts($student['student_id']);

        $gradesModel = new GradesModel();
        $grades = $gradesModel->getGradesByStudent($studentID);

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
            'title' => 'Profile',
            'page' => 'Profile',
            'student' => $student,
            'account' => $account,
            'gpa' => $overallGpa
        ];
        
        return 
            view('templates/student/header', $data)
            . view('pages/students/profile')
            . view('templates/student/footer')
        ;
    }

    public function update()
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

        $studentInfoModel = new \App\Models\StudentInformation();
        $studentAccountModel = new \App\Models\StudentsAccounts();

        // Update student information
        $studentData = [
            'firstname'  => $this->request->getPost('firstname'),
            'middlename' => $this->request->getPost('middlename'),
            'lastname'   => $this->request->getPost('lastname'),
            'birthday'   => $this->request->getPost('birthday'),
        ];
        $studentInfoModel->update($studentID, $studentData);

        // Update email in account table
        $email = $this->request->getPost('email');
        if ($email) {
            $studentAccountModel->where('student_id', $studentID)->set(['email' => $email])->update();
        }

        $session->setFlashdata('success', 'Profile updated successfully.');
        return redirect()->to('student/profile');
    }
}