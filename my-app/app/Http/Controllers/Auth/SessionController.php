<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class SessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'min:3'],
            'password' => ['required', 'string', Password::default()],
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect('/ideas');
        };

        return back()->withErrors([
            'email' => 'The provided credentials are incorrect'
        ]);
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/ideas');
    }
}
