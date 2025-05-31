<?php
namespace App\Controllers\Faculty; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController
use App\Models\Classes;


class FacultyClasses extends BaseController
{
    public function classes()
    {
        $session = session();
        $faculty_id = $session->get('user_id');
        $model = new Classes();


        $data = [
            'title' => 'Class',
            'id' => $session->get('user_id'),
            'classes' => $model->getClasses($faculty_id),
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
            'id' => $session->get('user_id'),
        ];

        if ($this->request->getMethod() === 'POST') {
            // Validation rules
            $rules = [
                'class_name'   => 'required|min_length[2]|max_length[100]',
                'class_code'   => 'required|min_length[2]|max_length[20]',
                'description'  => 'required|min_length[2]|max_length[255]',
            ];

            if (!$this->validate($rules)) {
                $session->setFlashdata('error', $this->validator->listErrors());
                return view('templates/faculty/header', $data)
                    . view('pages/faculty/forms/addClassForm')
                    . view('templates/faculty/footer');
            }

            // Prepare data
            $facultyId = $session->get('user_id');
            $courseCode = strtoupper(bin2hex(random_bytes(4))); // Example: 8-char random code

            $classData = [
                'title'   => $this->request->getPost('class_name'),
                'description'  => $this->request->getPost('description'),
                'course_code'  => $this->request->getPost('class_code'),
                'faculty_id'   => $facultyId,
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
                    return redirect()->to('/faculty/addClass')->withInput();
                } else {
                    $session->setFlashdata('success', 'Class added successfully.');
                    return redirect()->to('/faculty/class');
                }
            } catch (\Exception $e) {
                $db->transRollback();
                $session->setFlashdata('error', 'An error occurred: ' . $e->getMessage());
                return redirect()->to('/faculty/addClass')->withInput();
            }
        }

        return view('templates/faculty/header', $data)
            . view('pages/faculty/forms/addClassForm')
            . view('templates/faculty/footer');
    }

    public function updateClass($id){
        $session = session();
        helper('form');
        $model = new Classes();

        // Fetch the class to update
        $class = $model->find($id);
        if (!$class) {
            $session->setFlashdata('error', 'Class not found.');
            return redirect()->to('/faculty/class');
        }

        $data = [
            'title' => 'Update Class',
            'class' => $class,
            'id'    => $session->get('user_id'),
        ];

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'class_name'   => 'required|min_length[2]|max_length[100]',
                'description'  => 'required|min_length[2]|max_length[255]',
            ];

            if (!$this->validate($rules)) {
                $session->setFlashdata('error', $this->validator->listErrors());
                return view('templates/faculty/header', $data)
                    . view('pages/faculty/forms/updateClassForm')
                    . view('templates/faculty/footer');
            }

            $updateData = [
                'id'          => $id,
                'title'       => $this->request->getPost('class_name'),
                'description' => $this->request->getPost('description'),
                // 'course_code' should not be updated unless you want to allow it
            ];

            try {
                $model->save($updateData);
                $session->setFlashdata('success', 'Class updated successfully.');
                return redirect()->to('/faculty/class');
            } catch (\Exception $e) {
                $session->setFlashdata('error', 'An error occurred: ' . $e->getMessage());
                return redirect()->back()->withInput();
            }
        }

        return view('templates/faculty/header', $data)
            . view('pages/faculty/forms/updateClassForm')
            . view('templates/faculty/footer');
    }

    public function deleteClass($id){
        $session = session();
        $model = new Classes();

        try {
            $model->delete($id);
            $session->setFlashdata('success', 'Class deleted successfully.');
        } catch (\Exception $e) {
            $session->setFlashdata('error', 'An error occurred: ' . $e->getMessage());
        }
        return redirect()->to('/faculty/class');
    }
}