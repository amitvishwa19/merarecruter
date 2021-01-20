<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidateController extends Controller
{

    public function dashboard()
    {
        return view('client.pages.candidate.dashboard');
    }


    public function profile()
    {
        return view('client.pages.candidate.profile');
    }

    public function resume()
    {
        return view('client.pages.candidate.resume');
    }

    public function resume_add()
    {
        return view('client.pages.candidate.resume_add');
    }

    public function shortlisted_jobs()
    {
        return view('client.pages.candidate.shortlisted_jobs');
    }

    public function applied_jobs
    ()
    {
        return view('client.pages.candidate.applied_jobs');
    }

    public function job_alerts()
    {
        return view('client.pages.candidate.job_alerts');
    }

    public function cv_cover_letter()
    {
        return view('client.pages.candidate.cv_cover_letter');
    }

    public function change_password()
    {
        return view('client.pages.candidate.change_password');
    }

}
