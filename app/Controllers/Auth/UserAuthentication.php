<?php
namespace App\Controllers\Auth;


use App\Controllers\BaseController;
use App\Models\PersonnelAccounts;
use App\Models\StudentsAccounts;
use App\Models\StudentInformation;


class UserAuthentication extends BaseController {
    public function adminLogin()
    {
        $session = session();
        helper(['form']);

        if ($this->request->getMethod() === 'POST') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $personnelModel = new PersonnelAccounts();
            $admin = $personnelModel->where([
                'email' => $email,
                'role'  => 'Admin'
            ])->first();

            if ($admin && password_verify($password, $admin['password'])) {
                $session->set([
                    'user_id'   => $admin['id'],
                    'email'     => $admin['email'],
                    'role'      => $admin['role'],
                    'isLoggedIn'=> true
                ]);
                $session->setFlashdata('success', 'Hello, ' . $admin['firstname'] . '! Welcome to your dashboard.');
                return redirect()->route('admin/dashboard');
            } else {
                $session->setFlashdata('error', 'Invalid credentials.');
                return redirect()->to('/admin')->withInput();
            }
        }
        return view('pages/admin/index');
    }

    public function facultyLogin()
    {
        $session = session();
        helper(['form']);

        if ($this->request->getMethod() === 'POST') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $personnelModel = new PersonnelAccounts();
            $faculty = $personnelModel->where([
                'email' => $email,
                'role'  => 'Faculty'
            ])->first();

            if ($faculty && password_verify($password, $faculty['password'])) {
                $session->set([
                    'user_id'   => $faculty['id'],
                    'email'     => $faculty['email'],
                    'role'      => $faculty['role'],
                    'isLoggedIn'=> true
                ]);
                $session->setFlashdata('success', 'Hello, ' . $faculty['firstname'] . '! Welcome to your dashboard.');
                return redirect()->route('faculty/dashboard');
            } else {
                $session->setFlashdata('error', 'Invalid credentials.');
                return redirect()->to('/faculty')->withInput();
            }
        }
        return view('pages/faculty/index');
    }

    public function studentLogin()
    {
        $session = session();
        helper(['form']);

        if ($this->request->getMethod() === 'POST') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $studentModel = new StudentsAccounts();
            $student = $studentModel->where('email', $email)->first();

            if ($student && password_verify($password, $student['password'])) {
                $studentInformationModel = new StudentInformation();
                $studentInfo = $studentInformationModel->getStudentsInformation($student['id']);
                $session->set([
                    'user_id'   => $studentInfo['id'],
                    'email'     => $student['email'],
                    'role'      => 'student',
                    'isLoggedIn'=> true
                ]);
                $session->setFlashdata('success', 'Hello, Student! Welcome to your dashboard.');
                return redirect()->route('student');
            } else {
                $session->setFlashdata('error', 'Invalid credentials.');
                return redirect()->to('/')->withInput();
            }
        }

        return view('pages/students/index');
    }
}