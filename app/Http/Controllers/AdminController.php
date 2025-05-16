<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getDoctorslist() {
        return view('dashboard.admin.admin-doctors');
    }
}
