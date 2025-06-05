<?php

namespace App\Controllers\Faculty;

use App\Controllers\BaseController;
use App\Models\ActivitiesModel;
use App\Models\SubmissionModel;
use App\Models\StudentInformation;
use App\Models\PersonnelAccounts;

class ActivityView extends BaseController
{
    public function view($activity_id)
    {
        $session = session();
        // Check if user is logged in and is faculty
        if ($session->get('user_role') !== 'Faculty') {
            // Optionally set a flash message
            $session->setFlashdata('error', 'Access denied.');
            // Redirect to login or another page
            return redirect()->to('/faculty');
        }
        $faculty_id = $session->get('user_id');
        $activityModel = new ActivitiesModel();
        $submissionModel = new SubmissionModel();
        $studentModel = new StudentInformation();
        $personnelAccount = new PersonnelAccounts();

        // Get activity details
        $activity = $activityModel->find($activity_id);

        // Get all submissions for this activity
        $submissions = $submissionModel->where('activity_id', $activity_id)->findAll();

        // Get student info for each submission
        $students = [];
        foreach ($submissions as $submission) {
            $student = $studentModel->find($submission['student_id']);
            if ($student) {
                $students[] = [
                    'student'    => $student,
                    'submission' => $submission
                ];
            }
        }

        $data = [
            'title'     => 'View Activity',
            'activity'  => $activity,
            'students'  => $students,
            'faculty' => $personnelAccount->getPersonnelsAccounts($faculty_id),
        ];

        return view('templates/faculty/header', $data)
            . view('pages/faculty/activityView', $data)
            . view('templates/faculty/footer');
    }
}