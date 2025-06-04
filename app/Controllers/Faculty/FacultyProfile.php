<?php
namespace App\Controllers\Faculty; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController

use App\Models\PersonnelAccounts;

class FacultyProfile extends BaseController
{
    public function profile() {
        $session = session();
        $faculty_id = $session->get('user_id');
        $personnelAccount = new PersonnelAccounts();

        $data = [
            'title' => 'Grades',
            'faculty' => $personnelAccount->getPersonnelsAccounts($faculty_id),
        ];
        
        return 
            view('templates/faculty/header', $data)
            . view('pages/faculty/profile')
            . view('templates/faculty/footer')
        ;
    }

    public function update()
        {
            $session = session();
            helper(['form']);

            $id = $this->request->getPost('id');
            $data = [
                'firstname'      => $this->request->getPost('firstname'),
                'lastname'       => $this->request->getPost('lastname'),
                'middlename'     => $this->request->getPost('middlename'),
                'department'     => $this->request->getPost('department'),
                'email'          => $this->request->getPost('email'),
                'contact_number' => $this->request->getPost('contact_number'),
            ];

            $model = new \App\Models\PersonnelAccounts();
            if ($model->update($id, $data)) {
                $session->setFlashdata('success', 'Profile updated successfully.');
            } else {
                $session->setFlashdata('error', 'Failed to update profile.');
            }
            return redirect()->to('faculty/profile');
        }

}