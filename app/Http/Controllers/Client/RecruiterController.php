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
}
