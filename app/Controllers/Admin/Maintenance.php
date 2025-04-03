<?php 

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PersonnelAccounts;
use App\Models\StudentsAccounts;
use CodeIgniter\Exceptions\PageNotFoundException;
use Exception;

class Maintenance extends BaseController {
    public function getPersonnelsAccounts() {
        $model = model(PersonnelAccounts::class);

        $data = [
            'account_list' => $model->getPersonnelsAccounts(),
            'title' => 'Accounts'
        ]; 

        return view('templates/admin/header', $data)
            . view('pages/admin/personnelsAccount')
            . view('templates/admin/footer')
        ;

    }

    public function createPersonnelsAccount() {
        $session = session();
        $model = model(PersonnelAccounts::class);
        helper('form');
        
        $data = [
            'title' => 'Create New Account'
        ];
    

        if ($this->request->getMethod() === 'POST') {
            // Define validation rules
            $validationRules = [
                'firstname'       => 'required|alpha_space|min_length[2]|max_length[50]',
                'middlename'      => 'permit_empty|alpha_space|max_length[50]',
                'lastname'        => 'required|alpha_space|min_length[2]|max_length[50]',
                'email'           => 'required|valid_email|is_unique[school_personnel.email]',
                'password'        => 'required|min_length[6]',
                'role'            => 'required|in_list[Administrator,Faculty]',
                'department'      => 'permit_empty|alpha_numeric_space|max_length[100]',
                'contact_number'  => 'permit_empty|numeric|min_length[10]|max_length[15]'
            ];
    
            // Validate form
            if (!$this->validate($validationRules)) {
                // Store validation errors in session
                $session->setFlashdata('error', $this->validator->listErrors());
                
                return view('templates/admin/header', $data)
                    . view('pages/admin/forms/addPersonnelForm')
                    . view('templates/admin/footer');
            }
    
            // Get validated data directly from the request
            $formData = [
                'firstname' => $this->request->getPost('firstname'),
                'middlename' => $this->request->getPost('middlename'),
                'lastname' => $this->request->getPost('lastname'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'role' => $this->request->getPost('role'),
                'department' => $this->request->getPost('department'),
                'contact_number' => $this->request->getPost('contact_number')
            ];
    
            // Try to save to database and debug
            try {
                $result = $model->save($formData);
                if ($result) { // If success
                    $session->setFlashdata('success', 'Account created successfully.');
                    return redirect()->to('/admin/accounts');
                } else {
                    // Get database errors if any
                    $errors = $model->errors();
                    $session->setFlashdata('error', json_encode($errors));
                    return redirect()->to('/admin/createAccount')->withInput();
                }
            } catch (\Exception $e) {
                $session->setFlashdata('error', 'Database error: ' . $e->getMessage());
                return redirect()->to('/admin/createAccount')->withInput();
            }
        }
        
        return view('templates/admin/header', $data)
            . view('pages/admin/forms/addPersonnelForm')
            . view('templates/admin/footer');
    }

    public function updatePersonnelsAccount($id) {
        $session = session();
        $model = model(PersonnelAccounts::class);
        helper('form');
        $account = $model->find($id);
        
        if (!$account) {
            $session->setFlashdata('error', 'Personnel not found.');
            return redirect()->to('/admin/accounts');
        }
        
        
        if ($this->request->getMethod() === 'POST') {
            // Define validation rules
            $validationRules = [
                'firstname'       => 'required|alpha_space|min_length[2]|max_length[50]',
                'middlename'      => 'permit_empty|alpha_space|max_length[50]',
                'lastname'        => 'required|alpha_space|min_length[2]|max_length[50]',
                'email'           => 'required|valid_email',
                'password'        => 'permit_empty|min_length[6]', // No hashing yet
                'role'            => 'required|in_list[Administrator,Faculty]',
                'department'      => 'permit_empty|alpha_numeric_space|max_length[100]',
                'contact_number'  => 'permit_empty|numeric|min_length[10]|max_length[15]'
            ];
    
            // Validate form
            if (!$this->validate($validationRules)) {
                // Store validation errors in session
                $session->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to("/admin/editAccount/{$id}")->withInput();
            }
    
            // Get validated data
            $formData = $this->request->getPost([
                'firstname', 'middlename', 'lastname', 'email', 
                'role', 'department', 'contact_number'
            ]);
    
            // Check if password was entered, then hash it
            $password = $this->request->getPost('password');
            if (!empty($password)) {
                $formData['password'] = password_hash($password, PASSWORD_BCRYPT);
            }
    
            try {
                // Update the account in the database
                $success = $model->update($id, $formData);
                
                if ($success) {
                    $session->setFlashdata('success', 'Account updated successfully.');
                    return redirect()->to("/admin/accounts");
                } else {
                    $session->setFlashdata('error', 'An error occurred while updating the account.');
                    return redirect()->to("/admin/editAccount/{$id}")->withInput();
                }
            } catch (Exception $e) {
                $session->setFlashdata('error', 'An error occurred: ' . $e->getMessage());
                return redirect()->to("/admin/editAccount/{$id}")->withInput();
            }
        }
        
        $data = [
            'title' => 'Create New Account',
            'accounts_list' => $model->getPersonnelsAccounts($id)
        ];

        return view('templates/admin/header', $data)
            . view('pages/admin/forms/editPersonnelForm')
            . view('templates/admin/footer');

    }

    public function deletePersonnelsAccount($id) {
        $session = session();
        $model = model(PersonnelAccounts::class);

        // Check if the account exists
        $account = $model->find($id);

        if (!$account) {
            $session->setFlashdata('error', 'Account not found.');
            return redirect()->to('/admin/accounts');
        }

        // Delete the account
        $model->delete($id);

        // Store success message in session flashdata
        $session->setFlashdata('success', 'Account deleted successfully.');

        return redirect()->to('/admin/accounts');


    }
    
    public function getStudentsAccounts() {
        $model = model(StudentsAccounts::class);

        $data = [
            'account_list' => $model->getStudentsAccounts(),
            'title' => 'Students Accounts'
        ]; 

        return view('templates/admin/header', $data)
            . view('pages/admin/studentsAccount')
            . view('templates/admin/footer')
        ;
    }


    public function createStudentAccount() {
        $session = session();
        $model = model(StudentsAccounts::class);
        helper('form');

        $data = [
            'title' => 'Create Student Account'
        ];

        if ($this->request->getMethod() === 'POST') {

        }

        return view('templates/admin/header', $data)
            . view('pages/admin/forms/addStudentForm')
            . view('templates/admin/footer');        
        ;

    }


}
