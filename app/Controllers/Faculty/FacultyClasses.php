<?php
namespace App\Controllers\Faculty;
use App\Controllers\BaseController;
use App\Models\Classes;
use App\Models\PersonnelAccounts;
use App\Models\ActivitiesModel;

class FacultyClasses extends BaseController
{
    public function classes()
    {
        $session = session();
        $faculty_id = $session->get('user_id');
        $model = new Classes();
        $personnelAccount = new PersonnelAccounts();


        $data = [
            'title' => 'Class',
            'id' => $session->get('user_id'),
            'classes' => $model->getClasses($faculty_id),
            'faculty' => $personnelAccount->getPersonnelsAccounts($faculty_id),
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

    public function classActivities($class_id) {

        $session = session();
        $faculty_id = $session->get('user_id');
        $model = new Classes();
        $personnelAccount = new PersonnelAccounts();
        $activitiesModel = new ActivitiesModel();

        $data = [
            'title' => 'Class',
            'id' => $session->get('user_id'),
            'activities' => $activitiesModel->getActivities($class_id),
            'current_class' => $model->getClass($class_id),
            
            'faculty' => $personnelAccount->getPersonnelsAccounts($faculty_id),
        ];

        return 
            view('templates/faculty/header', $data)
            . view('pages/faculty/classActivities')
            . view('templates/faculty/footer')
        ;
    }

    public function addActivity()
{
    $session = session();
    $activityModel = new ActivitiesModel();

    // Log POST data
    $postData = $this->request->getPost();
    log_message('debug', 'POST DATA: ' . print_r($postData, true));

    // Validate input
    $validation = \Config\Services::validation();
    $validation->setRules([
        'activity_type' => 'required',
        'title'         => 'required',
        'description'   => 'required',
        'deadline'      => 'permit_empty|valid_date',
        'max_score'     => 'permit_empty|numeric',
        'class_id'      => 'required'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        log_message('error', 'Validation failed: ' . print_r($validation->getErrors(), true));
        $session->setFlashdata('error', 'Validation failed');
        return redirect()->back()->withInput();
    }

    // Prepare data for insertion
    $data = [
        'activity_type' => $postData['activity_type'],
        'title'         => $postData['title'],
        'description'   => $postData['description'],
        'deadline'      => $postData['deadline'],
        'max_score'     => $postData['max_score'],
        'class_id'      => $postData['class_id']
    ];

        log_message('debug', 'Prepared INSERT data: ' . print_r($data, true));

    try {
        if ($activityModel->insert($data)) {
            log_message('debug', 'Activity inserted successfully.');
            $session->setFlashdata('success', 'Activity successfully added.');
        } else {
            // Model validation failed internally
            $errors = $activityModel->errors();
            log_message('error', 'Model insert errors: ' . print_r($errors, true));
            $session->setFlashdata('error', 'Insert failed: ' . implode(', ', $errors));
        }
    } catch (\Exception $e) {
        // Catch database or unexpected errors
        log_message('critical', 'Exception during insert: ' . $e->getMessage());
        $session->setFlashdata('error', 'Failed to add activity: ' . $e->getMessage());
    }

    return redirect()->back();
}
}