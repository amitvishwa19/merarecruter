<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecruiterController extends Controller
{
    public function dashboard()
    {
        return view('client.pages.recruiter.dashboard');
    }


    public function profile()
    {
        return view('client.pages.recruiter.profile');
    }

    public function manage_jobs()
    {
        return view('client.pages.recruiter.manage_jobs');
    }

    public function transactions()
    {
        return view('client.pages.recruiter.transactions');
    }

    public function resumes()
    {
        return view('client.pages.recruiter.resumes');
    }

    public function pakages()
    {
        return view('client.pages.recruiter.pakages');
    }

    public function post_jobs()
    {
        return view('client.pages.recruiter.post_jobs');
    }

    public function job_alerts()
    {
        return view('client.pages.recruiter.job_alerts');
    }

    public function change_password()
    {
        return view('client.pages.recruiter.change_password');
    }
}
