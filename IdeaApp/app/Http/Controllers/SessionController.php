<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'email' => ['required', 'string', 'min:3', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255']
        ]);

        if (!Auth::attempt($attributes)) {
            return back()->withErrors(['password' => 'Invalid Credentials'])->withInput();
        }

        $request->session()->regenerate();

        return redirect()->intended()->with("success", 'You are logged in.');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
