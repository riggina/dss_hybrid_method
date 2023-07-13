<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Validator;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        session(['isLoggedIn' => false]);
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request ->session()->regenerate();

            return redirect('/dashboard');
        }

        return back()->with('failure', 'Login failed!');
    }

}
