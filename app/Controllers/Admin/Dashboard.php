<?php

namespace App\Controllers\Admin; // Correct namespace for subfol
use App\Controllers\BaseController; // Import BaseController


class Dashboard extends BaseController
{
    public function dashboard()
    {
        $data['title'] = 'Home';
        
        return view('templates/admin/header', $data)
            . view('pages/admin/dashboard')
            . view('templates/admin/footer');
    }
}