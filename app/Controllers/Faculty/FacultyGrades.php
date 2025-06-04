<?php
namespace App\Controllers\Faculty; // Correct namespace for subfolder
use App\Controllers\BaseController; // Import BaseController
use App\Models\Classes;
use App\Models\PersonnelAccounts;
use App\Models\GradesModel;

class FacultyGrades extends BaseController
{
    public function grades()
    {
        $session = session();
        $faculty_id = $session->get('user_id');
        $personnelAccount = new PersonnelAccounts();
        $classes = new Classes();

        $data = [
            'title' => 'Grades',
            'classes' => $classes->where('faculty_id', $faculty_id)->findAll(),
            'faculty' => $personnelAccount->getPersonnelsAccounts($faculty_id),
            'students' => [] // Default empty, will be filled when a class is selected
        ];
        $data['class_id'] = $this->request->getGet('class_id');

        // If a class is selected via GET parameter
        $class_id = $this->request->getGet('class_id');
        if ($class_id) {
            $gradesModel = new GradesModel();
            $students = $gradesModel->getGradesByClass($class_id);

            // Prepare students array for the view
            $data['students'] = array_map(function($row) {
                $name = $row['firstname'] . ' ' . $row['lastname'];
                $average = ($row['midterm'] !== null && $row['finals'] !== null)
                    ? round((($row['midterm'] + $row['finals']) / 2), 2)
                    : 'N/A';
                return [
                    'student_id' => $row['student_id'],
                    'student_number' => $row['student_number'],
                    'name' => $name,
                    'midterm' => $row['midterm'],
                    'final' => $row['finals'],
                    'average' => $average,
                ];
            }, $students);
        }

        return 
            view('templates/faculty/header', $data)
            . view('pages/faculty/grades')
            . view('templates/faculty/footer');
    }

    public function updateGrade()
    {
        $session = session();
        $gradesModel = new GradesModel();

        $student_id = $this->request->getPost('student_id');
        $class_id = $this->request->getPost('class_id');
        $midterm = (float) $this->request->getPost('midterm');
        $final = (float) $this->request->getPost('final');
        $average = ($midterm !== null && $final !== null) ? round((($midterm + $final) / 2), 2) : null;

        // Check if grade exists
        $existing = $gradesModel->getStudentGrade($student_id, $class_id);

        $gradeData = [
            'student_id' => $student_id,
            'class_id' => $class_id,
            'midterm' => $midterm,
            'finals' => $final,
            'gwa' => $average
        ];

        if ($existing) {
            // Update
            $gradesModel->update($existing['id'], $gradeData);
            $session->setFlashdata('success', 'Grades updated successfully.');
        } else {
            // Insert
            $gradesModel->insert($gradeData);
            $session->setFlashdata('success', 'Grades added successfully.');
        }

        return redirect()->back();
    }

    // Optional: For AJAX or direct class filtering
    public function gradesByClass($class_id)
    {
        $gradesModel = new GradesModel();
        $students = $gradesModel->getGradesByClass($class_id);
        return $this->response->setJSON($students);
    }

}