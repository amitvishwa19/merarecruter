<?php

namespace App\Http\Controllers\digilearn\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('digilearn.pages.dashboard.dashboard');
    }
}
