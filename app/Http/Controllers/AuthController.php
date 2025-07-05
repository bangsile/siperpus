<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
			return redirect()->route('dashboard');
		}
        return view('auth.login');
    }

    public function destroy(Request $request)
	{
		// Hapus session untuk logout
		Session::forget('auth');
		Auth::logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect('/');
	}
}
