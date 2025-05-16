<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function Dashboard() {
        if(Auth::user()->type == 'admin')
        {
            return view('dashboard.admin');
        } 
        else if (Auth::user()->type == 'doctor') {
            return view('dashboard.doctor');
        }
        else {
            return view('dashboard.patient');
        }
    }

    function Appointment() {
        return view('dashboard.appointment');
    }
}
