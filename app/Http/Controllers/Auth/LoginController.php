<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => Rule::exists('users')->where(function ($query) {
                $query->where('status', 1);
            }),
            'password' => 'required|string'
        ]);
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['guest','checkstatus'])->except('logout');
    }
}
