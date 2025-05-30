<?php
namespace App\Controllers\Faculty; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController
use App\Models\Classes;


class FacultyClasses extends BaseController
{
    public function classes()
    {
        $data = [
            'title' => 'Class'
        ];
        return 
            view('templates/faculty/header', $data)
            . view('pages/faculty/classes')
            . view('templates/faculty/footer')
        ;
    }

    public function addClass(){
        $session = session();
        helper('form');
        $data = [
            'title' => 'Add Class',
        ];

        if ($this->request->getMethod() === 'POST') {
            // Validation rules
            $rules = [
                'class_name'   => 'required|min_length[2]|max_length[100]',
                'description'  => 'required|min_length[2]|max_length[255]',
            ];

            if (!$this->validate($rules)) {
                $session->setFlashdata('error', $this->validator->listErrors());
                return view('templates/faculty/header', $data)
                    . view('pages/faculty/forms/addClassForm')
                    . view('templates/faculty/footer');
            }

            // Prepare data
            $facultyId = $session->get('faculty_id');
            $courseCode = strtoupper(bin2hex(random_bytes(4))); // Example: 8-char random code

            $classData = [
                'class_name'   => $this->request->getPost('class_name'),
                'description'  => $this->request->getPost('description'),
                'course_code'  => $courseCode,
                'faculty_id'   => $facultyId,
                // 'created_at' handled by DB
            ];

            // Transaction
            $db = \Config\Database::connect();
            $db->transStart();

            try {
                $model = new Classes();
                $result = $model->save($classData);

                $db->transComplete();

                if ($db->transStatus() === false || !$result) {
                    $db->transRollback();
                    $session->setFlashdata('error', 'Failed to add class. Please try again.');
                    return redirect()->to('/faculty/classes/add')->withInput();
                } else {
                    $session->setFlashdata('success', 'Class added successfully.');
                    return redirect()->to('/faculty/classes');
                }
            } catch (\Exception $e) {
                $db->transRollback();
                $session->setFlashdata('error', 'An error occurred: ' . $e->getMessage());
                return redirect()->to('/faculty/classes/add')->withInput();
            }
        }

        return view('templates/faculty/header', $data)
            . view('pages/faculty/forms/addClassForm')
            . view('templates/faculty/footer');
    }
}