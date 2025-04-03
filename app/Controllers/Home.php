<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('pages/students/index');
    }

    public function faculty():string {
        return view('pages/faculty/index');
    }

    public function admin():string {
        return view('pages/admin/index');
    }
}
