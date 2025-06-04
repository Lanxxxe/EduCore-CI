<?php

namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\SubmissionModel;

class StudentActivity extends BaseController
{
    public function submit()
    {
        $session = session();
        $student_id = $session->get('user_id');
        $activity_id = $this->request->getPost('activity_id');
        $remarks = $this->request->getPost('remarks');
        $file = $this->request->getFile('activity_file');

        // Validate file
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $originalName = $file->getClientName(); // Get original filename
            $uploadPath = FCPATH . 'uploads/submissions'; // FCPATH points to /public
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $file->move($uploadPath, $originalName);
            $filepath = 'uploads/submissions/' . $originalName;
        } else {
            $filepath = null;
        }

        $data = [
            'student_id'      => $student_id,
            'activity_id'     => $activity_id,
            'submission_date' => date('Y-m-d H:i:s'),
            'remarks'         => $remarks,
            'filepath'        => $filepath,
            // 'score' can be null at submission
        ];

        $model = new SubmissionModel();
        if ($model->insert($data)) {
            $session->setFlashdata('success', 'Submission successful!');
        } else {
            $session->setFlashdata('error', 'Submission failed.');
        }

        return redirect()->back();
    }
}