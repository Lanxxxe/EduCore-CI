<?php

namespace App\Controllers\Student; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController
use App\Models\StudentInformation;
use App\Models\Classes;
use App\Models\ClassStudents;

class StudentClass extends BaseController
{
    public function class()
    {
        $model = new StudentInformation();
        $classesModel = new Classes();
        $session = session();

        $studentID = $session->get('user_id');
        
        $data = [
            'title' => 'Classes',
            'page' => 'Class',
            'student' => $model->getStudentsInformation($studentID),
            'classes' => $classesModel->getStudentsClasses($studentID),
        ];
        
        return 
            view('templates/student/header', $data)
            . view('pages/students/class')
            . view('templates/student/footer')
        ;
    }

    public function joinClass() {
        $session = session();
        $studentID = $session->get('user_id');
        $classModel = new Classes();
        $classStudentsModel = new ClassStudents();
        $studentInformationModel = new StudentInformation();
        $student = $studentInformationModel->getStudentsInformation($studentID);

        try {
            $courseCode = $this->request->getPost('class_code');
            $class = $classModel->checkClass($courseCode);

            if (!$class) {
                $session->setFlashdata('error', 'Class not found. Please check the course code.');
                return redirect()->back()->withInput();
            }

            $existingClass = $classStudentsModel
            ->where('student_id', $studentID)
            ->where('class_id', $class['course_code'])
            ->first();

            if ($existingClass) {
                $session->setFlashdata('info', 'You have already joined this class.');
                return redirect()->back();
            }

            // Join the class
            $classStudentsModel->joinClassStudents($studentID, $class['id']);
            $session->setFlashdata('success', 'Successfully joined the class!');
            return redirect()->back();


        } catch (\Exception $e) {
            $session->setFlashdata('error', 'An error occurred while checking the class.' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}