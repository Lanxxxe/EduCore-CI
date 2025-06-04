<?php
namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\Classes;
use App\Models\ActivitiesModel;
use App\Models\ClassStudents;
use App\Models\StudentInformation;
use App\Models\SubmissionModel;

class ClassDetails extends BaseController
{
    public function view($class_id)
    {
        $session = session();
        $studentID = $session->get('user_id');

        // Check if student is enrolled in this class
        $classStudentsModel = new ClassStudents();
        $enrolled = $classStudentsModel
            ->where('student_id', $studentID)
            ->where('class_id', $class_id)
            ->first();

        if (!$enrolled) {
            $session->setFlashdata('error', 'You are not enrolled in this class.');
            return redirect()->to('student/class');
        }

        $classesModel = new Classes();
        $class = $classesModel->find($class_id);

        $activitiesModel = new ActivitiesModel();
        $activities = $activitiesModel->where('class_id', $class_id)->findAll();

        $submissionModel = new SubmissionModel();
        $activityIds = array_column($activities, 'id');
        $submissions = [];
        if (!empty($activityIds)) {
            $submissions = $submissionModel
                ->whereIn('activity_id', $activityIds)
                ->where('student_id', $studentID)
                ->findAll();
        }
        // Map submissions by activity_id
        $submissionMap = [];
        foreach ($submissions as $sub) {
            $submissionMap[$sub['activity_id']] = $sub;
        }

        $student = new StudentInformation();

        $data = [
            'title' => 'Class Details',
            'page' => 'Class Details',
            'class' => $class,
            'activities' => $activities,
            'student' => $student->studentInformation($studentID),
            'submissionMap' => $submissionMap,
        ];

        return view('templates/student/header', $data)
            . view('pages/students/classDetails')
            . view('templates/student/footer');
    }
}